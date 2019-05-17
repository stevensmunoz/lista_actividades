<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Actividades;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActividadPolicy
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

    /**
     * Determina si un usuario puede terminar la actividad
     *
     * @param \App\Models\User $user
     * @param \App\Models\Actividades $actividades
     * @return bool
     */
    public function complete(User $user, Actividades $actividades)
    {

        return $user->is($actividades->user);

    }
}
