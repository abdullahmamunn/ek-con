<?php

namespace App\Http\Controllers\Frontend;
use App\Model\MenuPost;
use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\MenuFrontend;
use App\UserMessage;
use Illuminate\Support\Facades\Session;
use App\UploadCv;
use Illuminate\Support\Facades\File;


class FrontController extends Controller
{
   
    public function __construct()
    {
       
        // $this->banner = $banner;
        // $this->home_news = $home_news;
        // $this->home_notice = $home_notice;
        // $this->contact = $contact;
       

    }
    
    public function home($url)
    {
        // return $url;
        
        // contact-us
        // contact-us
        switch($url){
            case 'contact-us':
                return view('frontend.single_pages.contact');
                break;
            case 'upload-cv':
                return view('frontend.single_pages.upload-cv');
                break;
        }
        

         $menu = DB::table('menu_frontends')->where('url', $url)->first();
         $ar =  json_decode(json_encode($menu),true);
         
         $sub_menu = DB::table('sub_menus')->where('link', $url)->first();
         $arr =  json_decode(json_encode($sub_menu),true);

        //  dd($ar['url'],$arr['link']);
         if($ar['url'] != $url AND $arr['link'] != $url)
         {
             return view('404');
         }
         if($menu)
         {
            $data = MenuPost::where('menu_id',$menu->id)->orderBy('created_at','desc')->get();
         }else{
            $data = MenuPost::where('submenu_id',$sub_menu->id)->orderBy('created_at','desc')->get();
         }

         return view('frontend.single_pages.home',compact('data'));
    }
    public function defaultHome()
    {
        $data = MenuPost::where('menu_id',1)->orderBy('created_at','desc')->get();
        return view('frontend.single_pages.home',compact('data'));
    }

    public function index()
    {
    	return view('backend.auth.login');
    }

    public function uploadCv(Request $request)
    {
      
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone_number"=>"required|min:15|max:15|",
            "file" =>"required"
        ]);
        // dd($request->all());
        $check = UploadCv::where('email',$request->email)->orWhere('phone_number',$request->phone_number)->first();
        if(!empty($check->email) == $request->email OR !empty($check->phone_number) == $request->phone_number)
        {
            Session::flash('error', 'You already Applied'); 
            return redirect()->back();
        }
        $upload = New UploadCv();
        $upload->name = $request->name;
        $upload->email = $request->email;
        $upload->phone_number = $request->phone_number;
        $fileName = time().$request->name.'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        $upload->file = $fileName;
        $upload->save();

        Session::flash('message', 'Thank you For your interest, we will call you if you are eligible'); 
        return redirect()->back();
    }
    public function contactForm(Request $request)
    {
        $validator=$request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $msg = new UserMessage();
        $msg->name = $request->name;
        $msg->email = $request->email;
        $msg->subject = $request->subject;
        $msg->message = $request->message;
        $msg->save();
        Session::flash('message', 'Thank you For your valuable message'); 
        return redirect()->back();
       
    }
    public function deleteCv($id)
    {
        // return $id;
        $delete = UploadCv::find($id);
        if(!empty($delete->file)){
            $path = public_path()."/uploads/".$delete->file;
            unlink($path);
            $delete->delete();
        }else{
            return redirect()->back()->with('error','Sorry! No file found to deleted');
        }
        
        return redirect()->back()->with('success','Data! successfully deleted');
    }
    public function deleteUsermessage($id)
    {
        $delete = UserMessage::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Data! successfully deleted');
    }

}
