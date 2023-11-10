<?php

namespace App\Http\Controllers\Backend\FrontendMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\FrontendMenu;
use App\Models\MenuType;
use App\Models\TopMenu;

class FrontendTopMenuController extends Controller
{

    public function viewMenu()
    {
        $menu_types = TopMenu::all();
        return view('backend.post.top_menu.view',compact('menu_types'));
    }

    public function createMenu()
    {
        $menu_types = TopMenu::all();
        return view('backend.post.top_menu.add');
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
        'menu_name' => 'required|unique:top_menus,menu_name'
        ]);

        $menu = new TopMenu();
        $menu->menu_name = $request->menu_name;
        $menu->save();

        return redirect()->route('frontend-menu.top_menu')->with('success','Menu Type added success');
    }

    public function editMenu($id)
    {
        $editData = TopMenu::find($id);
        return view('backend.post.top_menu.add', compact('editData'));
    }

    public function updateMenu(Request $request, $id)
    {
        $request->validate([
            'menu_name' => 'required|unique:top_menus,menu_name,'.$id
        ]);

        $data = TopMenu::find($id);
        $data->menu_name = $request->menu_name;
        $data->save();

        return redirect()->route('frontend-menu.top_menu')->with('success','Menu Type Updated Successfully');
    }


}

