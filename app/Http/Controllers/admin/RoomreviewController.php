<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\roomreview;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomreviewController extends Controller
{
   public function index(){
      $result['data']=DB::table('roomreviews')
                      ->join('rooms','roomreviews.roomid','=','rooms.id')
                      ->select('roomreviews.*','rooms.roomno')->latest('id')->get();
      return view('Admin.review',$result);
    }
    public function manage_reviews(Request $request,$id="")
    {
          
        if($id>0){
            $arr=roomreview::where(['id'=>$id])->get();
            $result['roomid']=$arr['0']->roomid;
            $result['id']=$arr['0']->id;
            $result['uname']=$arr['0']->uname;
            $result['ureview']=$arr['0']->ureview;
            $result['uimg']=$arr['0']->uimg;
         
        }
        else
        {
            $result['roomid']='';
            $result['id']='';
            $result['uname']='';
            $result['ureview']='';
            $result['uimg']='';
        }
        $result['room']=DB::table('rooms')->where('roomstatus',1)->get();
        return view("admin.manage_review",$result);

    }
     
     public function manage_reviews_process(Request $request)
    {
        //return $request->post();
         // $request->validate([
         //  'RoomNo'=>'required|unique:categories,roomno,'.$request->post('id'),    
         // ]);
         if($request->post('id')>0){
            $model=roomreview::find($request->post('id'));
            $msg="Review Updated";
         }
         else{
            $model=new roomreview();
            $msg="Review Added";
         }
          if($request->hasfile('uimg')){
            $image=$request->file('uimg');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->move(public_path().'/review',$image_name);
            $model->uimg=$image_name;
         }
         $model->uname=$request->post('uname');
         $model->roomid=$request->post('roomid');
         $model->ureview=$request->post('ureview');
         $model->urstatus=1;
         $model->save();
         $request->session()->flash('message',$msg);
         return redirect('admin/reviews');
  }
  
    public function delete(Request $request, $id)
    {
        $model=roomreview::find($id);
        $model->delete();
        $request->session()->flash('message','Review Deleted');
       return redirect('admin/reviews');
    }


     public function status(Request $request,$status,$id)
    {
        $model=roomreview::find($id);
        $model->urstatus=$status;
        $model->save();
        $request->session()->flash('message','Review Status Updated');
        return redirect('admin/reviews');

    }
}
