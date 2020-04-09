<?php

namespace App\Models;

use App\Models\Permission;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'url', 'parent_id', 'order', 'icon'];

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
