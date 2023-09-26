<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();

        $this->paginate = [
            'contain' => ['Users', 'Authors'],
        ];
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null) {
        $this->Authorization->skipAuthorization();

        /*
          $book = $this->Books->get($id, [
          'contain' => ['Users', 'Tags'],
          ]);
         * 
         */
        $book = $this->Books->findBySlug($slug)
                ->contain('Users')
                ->contain('Authors')
                ->contain('Tags')
                ->contain('Reviews')
                ->firstOrFail();

        $this->set(compact('book'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $book = $this->Books->newEmptyEntity();
        $this->Authorization->authorize($book);
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            // Changement: Chercher le user_id de l'utilisateur authentifié.
            $book->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if (!$book->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img' . DS . 'books' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);

                $book->image = $name;
            }

            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        //$users = $this->Books->Users->find('list', ['limit' => 200]);
        //$reviews = $this->Books->Reviews->find('list', ['limit' => 200]);
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $tags = $this->Books->Tags->find('list', ['limit' => 200]);
        $this->set(compact('book', 'tags', 'authors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null) {
        /*
          $book = $this->Books->get($id, [
          'contain' => ['Tags'],
          ]);
         * 
         */
        $book = $this->Books->findBySlug($slug)
                ->contain('Reviews')
                ->contain('Tags')
                ->contain('Authors')
                ->firstOrFail();

        $this->Authorization->authorize($book);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData(), [
                // Ajout: Empêcher la modification de user_id.
                'accessibleFields' => ['user_id' => false]
            ]);

            if (!$book->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img' . DS . 'books' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);

                $book->image = $name;
            }

            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $users = $this->Books->Users->find('list', ['limit' => 200]);
        $authors = $this->Books->Authors->find('list', ['limit' => 200]);
        $reviews = $this->Books->Reviews->find('list', ['limit' => 200]);
        $tags = $this->Books->Tags->find('list', ['limit' => 200]);
        $this->set(compact('book', 'users', 'authors', 'reviews', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);

        $this->Authorization->authorize($book);

        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
