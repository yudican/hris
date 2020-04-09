<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Menu',
            'menus' => Menu::get()->toTree()
        ];

        return view('admin.menu.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::whereNull('parent_id')->with('childrenMenus')->get();
        $data = [
            'title' => 'Buat Menu Baru',
            'menus' => $menus
        ];

        return view('admin.menu.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:menus',
            'url' => 'required|unique:menus',
            'icon' => 'required'
        ]);

        $menu = Menu::create([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id ? $request->parent_id : null,
            'order' => null
        ]);
        $menu->permissions()->create(['name' => strtolower($request->name).' add']);
        $menu->permissions()->create(['name' => strtolower($request->name).' edit']);
        $menu->permissions()->create(['name' => strtolower($request->name).' delete']);
        $menu->permissions()->create(['name' => strtolower($request->name).' read']);

        return redirect()->route('menu.index')->withSuccess('Menu Baru Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::whereNull('parent_id')->with('childrenMenus')->get();
        
        $data = [
            'title' => 'Edit Menu',
            'menu' => Menu::find($id),
            'action' => route('menu.update', ['menu' => $id]),
            'method' => 'PUT',
            'menus' => $menus
        ];

        return view('admin.menu.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|unique:menus',
            'url' => 'required|unique:menus',
            'icon' => 'required'
        ]);

        Menu::find($id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => $request->icon,
            'parent_id' => $request->parent_id ? $request->parent_id : null,
            'order' => null
        ]);

        return redirect()->route('menu.index')->withSuccess('Menu Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->route('menu.index')->withSuccess('Menu Baru Berhasil Dihapus');
    }

    /**
     * Update the specified parent category and category order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request)
    {
        
        $rebuild = Menu::rebuildTree($this->updateTreeView($request->data));
        
        return response()->json($rebuild, 200);
    }

    public function parentCategory()
    {
        $categories = Menu::all();
        $parents = [];
        foreach ($categories as $cat) {
            $category = Menu::where('id', $cat->parent_id)->get();
            if (count($category) > 0) {
                $parents[] = $category;
            }
        }
        return $parents;
    }

    public function updateTreeView($categories,$parent=null)
    {
        $no = 1;
        foreach ($categories as $d) {
            if (array_key_exists("children", $d)) {
                $this->updateTreeView($d['children'], $d['id']);
            }
            $update = Menu::find($d['id'])->update(['order' => $no, 'parent_id' => $parent]);
            $no++;
        }
        
        return $update;
    }
}
