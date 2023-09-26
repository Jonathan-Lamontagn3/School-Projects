<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

/**
 * User policy
 */
class UserPolicy {
    /**
     * Check if $user can add User
     *
     * @param \Authorization\IdentityInterface $currentUser The user.
     * @param \App\Model\Entity\User $user
     * @return bool
     */
    public function canAdd(IdentityInterface $currentUser, User $user) {

        return true;
    }
    /**
     * Check if $user can Edit User
     *
     * @param \Authorization\IdentityInterface $currentUser The user.
     * @param \App\Model\Entity\User $user
     * @return bool
     */
    public function canEdit(IdentityInterface $currentUser, User $user) {

        return $this->isUser($currentUser, $user);
    }
    /**
     * Check if $user can Delete User
     *
     * @param \Authorization\IdentityInterface $currentUser The user.
     * @param \App\Model\Entity\User $user
     * @return bool
     */
    public function canDelete(IdentityInterface $currentUser, User $user) {

        return $this->isUser($currentUser, $user);
    }
    /**
     * Check if $user can View User
     *
     * @param \Authorization\IdentityInterface $currentUser The user.
     * @param \App\Model\Entity\User $user
     * @return bool
     */
    public function canView(IdentityInterface $currentUser, User $user) {
        
    }

    // Verification si l'utilisateur en session à le même id que l'utilisateur sélectionner
    protected function isUser(IdentityInterface $currentUser, User $user) {
        
        return $user->id === $currentUser->getIdentifier();
    }

}
