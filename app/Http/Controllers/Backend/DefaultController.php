<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FrontendMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefaultController extends Controller
{
    public function statusChange(Request $request){
        $id  = $request->input('id');
        $status  = $request->input('status');
        $tablename  = $request->input('tablename');
        DB::table($tablename)->where('id',$id)->update(['status'=>$status]);
        return DB::table($tablename)->where('id',$id)->first()->status;
    }

    public function delete(Request $request){
        $id  = $request->input('id');
        $tablename  = $request->input('tablename');

        if($tablename == 'frontend_menus'){
            $data = DB::table($tablename)->where('id',$id)->first();
            $exist = DB::table($tablename)->where('parent_id',@$data->rand_id)->first();
            if($exist){   
                return 'exist';
            }
        }

        if($tablename == 'gallery_names'){
            $exist = DB::table('gallery_category')->where('gallery_name_id',$id)->first();
            if($exist){   
                return 'exist';
            }
        }

        if($tablename == 'gallery_category'){
            $exist = DB::table('gallery')->where('gallery_category_id',$id)->first();
            if($exist){   
                return 'exist';
            }
        }

        if($tablename == 'video_names'){
            $exist = DB::table('video_category')->where('video_name_id',$id)->first();
            if($exist){   
                return 'exist';
            }
        }

        if($tablename == 'video_category'){
            $exist = DB::table('video')->where('video_category_id',$id)->first();
            if($exist){   
                return 'exist';
            }
        }
        
        $delete =  DB::table($tablename)->where('id',$id)->delete();
        if($delete == '1'){
            return 'success';
        }else{
            return 'error';
        }
    }

    public function SubMenu(Request $request){
        $menu_id  = $request->input('menu_id');
        $sub_menu = FrontendMenu::where('parent_id',$menu_id)->get();
        $html='';

        if($menu_id!=''){
            if($menu_id!='0'){
                $html .='<option value="">Select Sub Menu</option>';
                $html .='<option value="0">New Sub Menu</option>';

                $html .='<optgroup label="Sub Menu">';
                foreach ($sub_menu as $key => $value) {
                    $html .='<option value="'.$value->rand_id.'">'.$value->title_en.'</option>';
                }
                $html .='</optgroup>';
            }
        }
        return $html;
    }
}
