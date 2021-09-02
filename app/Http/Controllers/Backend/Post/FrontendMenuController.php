<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\FrontendMenu;
use App\MenuFrontend;
use App\SubMenu;
use App\UserMessage;
use App\UploadCv;

class FrontendMenuController extends Controller
{
    public function view(){
        $menus = MenuFrontend::with('submenu')->orderBy('id','asc')->get();
        // return $menus;
        // return view('backend.post.menu-view', compact('menus'));
        return view('backend.post.view-menu', compact('menus'));
    }

    public function add(){
       
        $menus = MenuFrontend::where('status',1)->get();   
        return view('backend.post.menu-add',compact('menus'));
    }

    private function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); 

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }

    public function singleStore(Request $request){
        // return $request->all();
        if($request->menu_id != null){
            $service = MenuFrontend::where('id',$request->menu_id)->first();
            if($service == null){
                return redirect()->route('frontend-menu.menu.view')->with('error','Sorry never insert menu. Please try again.');
            }
        }else{
            $service = new MenuFrontend();
            // $service->parent_id = 0;
            // $service->rand_id = $this->getToken(10);
        }

        $service->menu_name = $request->menu_name;
        $service->url = $request->url;
        $service->status = $request->status;
        $service->save();
        return redirect()->route('frontend-menu.menu.view')->with('success','Well done! successfully inserted');
    }

    public function store(Request $request){
        // return $request->all();
        $submenu = new SubMenu();
        $submenu->menu_frontend_id = $request->menu_id;
        $submenu->submenu_name = $request->submenu_name;
        $submenu->status = $request->status;
        $submenu->link = $request->link;
        $submenu->save();

        return redirect()->route('frontend-menu.menu.view')->with('success','Well done! successfully inserted');
}

    public function edit($id){
        
        $editData = SubMenu::find($id);
        // return $editData;
        $menus = MenuFrontend::where('status',1)->get();
        if($editData == null)
        {
            return redirect()->back()->with('erroe','No Data found!');
        }
        
        return view('backend.post.submenu-edit', compact('editData','menus'));
    }
    public function updateSubmenu(Request $request,$id)
    {
        $update = Submenu::find($id);
        $update->submenu_name = $request->submenu_name;
        $update->link = $request->link;
        $update->status = $request->status;
        $update->save();
        return redirect()->route('frontend-menu.menu.add')->with('success','Well done! successfully updated!');
    }
    public function destroy($id)
    {
        $delete = SubMenu::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Well done! successfully deleted');

    }
 public function destroyMenu($id)
 {
     
    $parent_menu = MenuFrontend::find($id);
    foreach ($parent_menu->submenu as $child_menu){
        
            $child_menu->delete();
    }
    $parent_menu->delete();
    $data = 'success';
    return response()->json($data,200);
 }
 public function viewContact()
 {
     $user_msg = UserMessage::all();
     return view('backend.post.view-contact',compact('user_msg'));
 }
 public function viewCv()
 {
     $user_msg = UploadCv::all();
     return view('backend.post.view-cv',compact('user_msg'));
 }



}
