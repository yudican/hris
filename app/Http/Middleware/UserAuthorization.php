<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Menu;
use App\Models\Permission;

class UserAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $controller = explode('@', $request->route()->getActionName())[0];
        $where = [
            ['controller', '=', $controller],
            ['url', '!=', null]
        ];
        $checkController = Menu::with('permissions')->where($where)->get();
        if (!count($checkController) > 0) {
            return abort(419);
        }
        // $request->getMethod()
        $menuWithPermissions = Menu::with('permissions')->where($where)->first();
        $permissionsList = $menuWithPermissions->permissions()->pluck('name')->toArray();
        $permissions = auth()->user()->getPermissionsViaRoles()->pluck('name');
        // dd($permissions);
        foreach ($permissions as $permission) {
            if (in_array($permission, $permissionsList)) {
                $data = explode(' ', $permission);
                $type = $data[count($data) - 1];
                if ($request->getMethod() == 'POST') {
                    if ($type == 'Create') {
                        if (auth()->user()->can($permission)) {
                            return $next($request);
                        }
                    }
                }
                if ($request->getMethod() == 'GET') {
                    if ($type == 'Read') {
                        if (auth()->user()->can($permission)) {
                            return $next($request);
                        }
                    }
                }
                if ($request->getMethod() == 'PUT') {
                    if ($type == 'Update') {
                        if (auth()->user()->can($permission)) {
                            return $next($request);
                        }
                    }
                }
                if ($request->getMethod() == 'DELETE') {
                    if ($type == 'Delete') {
                        if (auth()->user()->can($permission)) {
                            return $next($request);
                        }
                    }
                }
            }
        }
        return abort(403);
    }
}
