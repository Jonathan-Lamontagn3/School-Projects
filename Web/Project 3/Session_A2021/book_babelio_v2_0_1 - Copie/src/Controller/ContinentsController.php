<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Continents Controller
 *
 * @property \App\Model\Table\ContinentsTable $Continents
 * @method \App\Model\Entity\Continent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContinentsController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
        $this->Authorization->skipAuthorization();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $continents = $this->paginate($this->Continents);

        $this->set(compact('continents'));
    }

    /**
     * View method
     *
     * @param string|null $id Continent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $continent = $this->Continents->get($id, [
            'contain' => ['Authors', 'Nationalities'],
        ]);

        $this->set(compact('continent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $continent = $this->Continents->newEmptyEntity();
        if ($this->request->is('post')) {
            $continent = $this->Continents->patchEntity($continent, $this->request->getData());
            if ($this->Continents->save($continent)) {
                $this->Flash->success(__('The continent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The continent could not be saved. Please, try again.'));
        }
        $this->set(compact('continent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Continent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $continent = $this->Continents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $continent = $this->Continents->patchEntity($continent, $this->request->getData());
            if ($this->Continents->save($continent)) {
                $this->Flash->success(__('The continent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The continent could not be saved. Please, try again.'));
        }
        $this->set(compact('continent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Continent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $continent = $this->Continents->get($id);
        if ($this->Continents->delete($continent)) {
            $this->Flash->success(__('The continent has been deleted.'));
        } else {
            $this->Flash->error(__('The continent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
