<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Book;
use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * Book policy
 */
class BookPolicy {

    /**
     * Check if $user can add Book
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Book $book
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Book $book) {
        //Seul les utilisateurs authentifiés avec un courriel confirmé peuvent créer des livres.
        return $this->isConfirm($user,$book);
    }

    /**
     * Check if $user can edit Book
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Book $book
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Book $book) {
        // Les utilisateurs authentifiés ne peuvent modifier que leurs livres.
        return $this->isAuthor($user, $book);
    }

    /**
     * Check if $user can delete Book
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Book $book
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Book $book) {
        // Les utilisateurs authentfiés ne peuvent supprimer que leurs livres.
        return $this->isAuthor($user, $book);
    }

    /**
     * Check if $user can view Book
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Book $book
     * @return bool
     */
    public function canView(IdentityInterface $user, Book $book) {
        
    }

    protected function isAuthor(IdentityInterface $user, Book $book) {
        return $book->user_id === $user->getIdentifier();
    }

    protected function isConfirm(IdentityInterface $user,Book $book) {

        return $user->getOriginalData()->confirmed === 1;
    }

}
