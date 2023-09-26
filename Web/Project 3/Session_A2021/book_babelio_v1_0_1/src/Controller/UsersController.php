<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        // Ajoutez la méthode beforeFilter au UsersController
        $this->Authentication->addUnauthenticatedActions(['index', 'edit', 'login', 'add', 'confirm', 'sendConfirmEmail']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();

        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Books', 'Reviews'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->uuid = Text::uuid();

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                $this->sendConfirmEmail($user);

                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'login',
                ]);

                return $this->redirect($redirect);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->Authorization->authorize($user);

        if ($user->uuid == '')
            $user->uuid = Text::uuid();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        $this->Authorization->authorize($user);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'login']);
    }

    public function login() {
        // Dans les méthodes add, login, et logout
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /books après la connexion réussie
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Books',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }

    // dans src/Controller/UsersController.php
    public function logout() {
        // Dans les méthodes add, login, et logout
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function sendConfirmEmail($user) {
        $this->Authorization->skipAuthorization();
        $email = new Mailer('default');
        $email->setTo($user->email)
                ->setSubject(__('Confirm your email'))
                ->deliver('http://' . $_SERVER['HTTP_HOST'] . $this->request->getAttribute('webroot') . 'users/confirm/' . $user->uuid);
    }

    public function confirm($uuid) {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->findByUuid($uuid)->firstOrFail();
        $user->confirmed = 1;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Thank you') . '. ' . __('Your email has been confirmed'));
            $this->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        $this->Flash->error(__('The confirmation could not be saved. Please, try again.'));
    }

    public function resendConfirmEmail($id = null) {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->sendConfirmEmail($user);
        
        return $this->redirect(['action' => 'index']);
    }

}
