<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\roomservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomservicesController extends Controller
{
   public function index(){
      $result['data']=DB::table('roomservices')->latest('id')->get();
      return view('Admin.roomservices',$result);
    }
    public function manage_roomservices(Request $request,$id="")
    {
          
        if($id>0){
            $arr=roomservices::where(['id'=>$id])->get();
            $result['rsname']=$arr['0']->rsname;
            $result['id']=$arr['0']->id;
        }
        else
        {
            $result['rsname']='';
            $result['id']='';     
        }
      
       
        return view("admin.manage_roomservices",$result);

    }
     
     public function manage_roomservices_process(Request $request)
    {
        
         $request->validate([
          'RoomService'=>'required|unique:roomservices,rsname,'.$request->post('id'),    
         ]);
          
         if($request->post('id')>0){
            $model=roomservices::find($request->post('id'));
            $msg="Room Services Updated";
         }
         else{
            $model=new roomservices();
            $msg="Room Services Added";
         }
        
         $model->rsname=$request->post('RoomService');
         $model->rstatus=1;
         $model->save();
         $request->session()->flash('message',$msg);
         return redirect('admin/roomservices');
    }

  
    public function delete(Request $request, $id)
    {
        $model=roomservices::find($id);
        $model->delete();
        $request->session()->flash('message','Services Deleted');
       return redirect('admin/roomservices');
    }


     public function status(Request $request,$status,$id)
    {
        $model=roomservices::find($id);
        $model->rstatus=$status;
        $model->save();
        $request->session()->flash('message','Services Updated');
        return redirect('admin/roomservices');

    }
}
