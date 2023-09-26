<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Nationalities Controller
 *
 * @property \App\Model\Table\NationalitiesTable $Nationalities
 * @method \App\Model\Entity\Nationality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NationalitiesController extends AppController {

    public function getByContinent() {
        $this->Authorization->skipAuthorization();
        $continent_id = $this->request->getQuery('continent_id');

        $nationalities = $this->Nationalities->find('all', [
            'conditions' => ['Nationalities.continent_id' => $continent_id],
        ]);
        $this->set('nationalities', $nationalities);
        $this->set('_serialize', ['nationalities']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Continents'],
        ];
        $nationalities = $this->paginate($this->Nationalities);

        $this->set(compact('nationalities'));
    }

    /**
     * View method
     *
     * @param string|null $id Nationality id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->Authorization->skipAuthorization();
        $nationality = $this->Nationalities->get($id, [
            'contain' => ['Continents', 'Authors'],
        ]);

        $this->set(compact('nationality'));
    }

}
