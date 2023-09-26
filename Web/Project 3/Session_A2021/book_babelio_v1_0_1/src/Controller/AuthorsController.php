<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Authors Controller
 *
 * @property \App\Model\Table\AuthorsTable $Authors
 * @method \App\Model\Entity\Author[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuthorsController extends AppController {

    public function findAuthors() {
        $this->Authorization->skipAuthorization();
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            $name = $this->request->getQuery('term');
            $results = $this->Authors->find('all', array(
                'conditions' => array('Authors.name LIKE ' => '%' . $name . '%')
            ));
            //debug($results); exit;
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Continents', 'Nationalities'],
        ];
        $authors = $this->paginate($this->Authors);

        $this->set(compact('authors'));
    }

    /**
     * View method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $author = $this->Authors->get($id, [
            'contain' => ['Continents', 'Nationalities', 'Books'],
        ]);

        $this->set(compact('author'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->Authorization->skipAuthorization();
        $author = $this->Authors->newEmptyEntity();
        if ($this->request->is('post')) {
            $author = $this->Authors->patchEntity($author, $this->request->getData());
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $continents = $this->Authors->Continents->find('list', ['limit' => 200]);
        $nationalities = $this->Authors->Nationalities->find('list', ['limit' => 200]);
        $this->set(compact('author', 'continents', 'nationalities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->Authorization->skipAuthorization();
        $author = $this->Authors->get($id, [
            'contain' => ['Nationalities'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $author = $this->Authors->patchEntity($author, $this->request->getData());
            if ($this->Authors->save($author)) {
                $this->Flash->success(__('The author has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The author could not be saved. Please, try again.'));
        }
        $continents = $this->Authors->Continents->find('list', ['limit' => 200]);
        $nationalities = $this->Authors->Nationalities->find('list', ['limit' => 200]);
        $this->set(compact('author', 'continents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Author id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $author = $this->Authors->get($id);
        if ($this->Authors->delete($author)) {
            $this->Flash->success(__('The author has been deleted.'));
        } else {
            $this->Flash->error(__('The author could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
