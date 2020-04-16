<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    use NodeTrait;

    protected $table = 'menu_permission';
}
