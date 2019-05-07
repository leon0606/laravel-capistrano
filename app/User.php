<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authentictable;

/**
 * @property mixed id
 * @property mixed avatar
 * @property mixed name
 */
class User extends Authentictable
{
    protected $guarded = [];
}
