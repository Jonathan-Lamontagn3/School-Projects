<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
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
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Users', 'Authors', 'Reviews', 'Tags'],
        ]);

        $this->set(compact('book'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
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
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Reviews', 'Tags'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
