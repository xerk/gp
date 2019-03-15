<?php

namespace App\Policies;

use App\User;
use App\Category;
use Eminiarts\NovaPermissions\Policies\Policy;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * The Permission key the Policy corresponds to.
     *
     * @var string
     */
    public static $key = 'categories';
}
