<?php

namespace App\Policies;

use App\Models\Collaborator;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CollaboratorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collaborator  $collaborator
     * @return mixed
     */
    public function view(User $user, Collaborator $collaborator)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role == 'Auditor'){
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collaborator  $collaborator
     * @return mixed
     */
    public function update(User $user, Collaborator $collaborator)
    {
        if($user->role == 'Auditor'){
            return redirect()->route('collaborator.index')
                 ->with( 'error' , 'No posee los permisos necesarios para editar al colaborador.' );
        }
   
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collaborator  $collaborator
     * @return mixed
     */
    public function delete(User $user, Collaborator $collaborator)
    {
        if($user->role == 'Auditor'){
            return false;
        }

        if($user->role == 'Editor'){
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collaborator  $collaborator
     * @return mixed
     */
    public function restore(User $user, Collaborator $collaborator)
    {
        if($user->role == 'Auditor'){
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Collaborator  $collaborator
     * @return mixed
     */
    public function forceDelete(User $user, Collaborator $collaborator)
    {
        if($user->role == 'Auditor'){
            return false;
        }

        if($user->role == 'Editor'){
            return false;
        }

        return true;
    }
}
