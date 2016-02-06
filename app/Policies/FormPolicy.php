<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Auth;
use App\User;
use App\Form;

class FormPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function delete(User $user, Form $form)
    {
        return $this->userOwnsForm($user, $form);
    }


    public function edit(User $user, Form $form)
    {
        return $this->userOwnsForm($user, $form);
    }

    public function update(User $user, Form $form)
    {
        return $this->userOwnsForm($user, $form);
    }

    protected function userOwnsForm(User $user, Form $form)
    {
        return $user->id === $form->user_id;
    }
}
