<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class Menu extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'url', 'parent_id', 'order', 'icon', 'controller', 'show'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function childrenMenus()
    {
        return $this->hasMany(Menu::class, 'parent_id')->with('menus');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'menu_permission', 'menu_id', 'permission_id');
    }

}
