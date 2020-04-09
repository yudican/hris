<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name'];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'menu_permission', 'permission_id', 'menu_id');
    }
}
