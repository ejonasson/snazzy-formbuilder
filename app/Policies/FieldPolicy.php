<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Form;
use App\Field;
use App\User;

class FieldPolicy
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

    public function hasFormAccess(User $user, Field $field)
    {
        // If a form ID is set, check against that
        if ($field->form_id) {
            return $user->id === $field->form->user_id;
        }
        // Otherwise, this is a new field, so the form would have access
        return true;
    }
}
