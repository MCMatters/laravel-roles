<?php

declare(strict_types=1);

namespace McMatters\LaravelRoles\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use McMatters\LaravelRoles\Traits\HasPermission;
use McMatters\LaravelRoles\Traits\HasRole;

/**
 * Class User
 *
 * @package McMatters\LaravelRoles\Tests\Models
 */
class User extends Authenticatable
{
    use HasPermission;
    use HasRole;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
