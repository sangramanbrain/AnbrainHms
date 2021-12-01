<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\banner;

class bannercontroller extends Controller
{
    public function index(request $request){
       
           $result['data']=banner::where('id',1)->get();

          if(count($result['data'])==0){
           $result['data'][0]=array(
              "img"=>'',
              "id"=>'',
            );
          }
       $result['data'][0]['id'];
        return view('admin.banner',$result);
    }

    public function bannersave(request $request,$id=""){
         
      // return $request->post('id');
        
         if($request->post('id')>0){
             $model=banner::find($request->post('id'));

             $msg="Image Updated";
          }
           else{
            $model=new banner();
            $msg="Image Inserted";
          }
            
          if($request->hasfile('image')){  
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->move(public_path().'/admin/bannerimage',$image_name);
            $model->img=$image_name;
         }
  
         $model->save();
         $request->session()->flash('message',$msg);

        return redirect('admin/homepage/banner');

    }

  

}
