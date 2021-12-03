<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  public function index(){
      $result['data']=DB::table('rooms')
                      ->join('categories','rooms.roomc','=','categories.id')
                      ->select('rooms.*','categories.categoryname')->latest('id')->get();
      return view('Admin.room',$result);
    }
    public function manage_room(Request $request,$id="")
    {
          
        if($id>0){
            $arr=room::where(['id'=>$id])->get();
            $result['roomno']=$arr['0']->roomno;
            $result['id']=$arr['0']->id;
            $rs=$arr['0']->rs;
            $result['ser']=explode('///',$rs);
            $result['roomc']=$arr['0']->roomc;
            $im=$arr['0']->rimg;
            $result['rimg']=explode('////',$im);
            $result['rdesc']=$arr['0']->rdesc;
            $result['price']=$arr['0']->price;
         
        }
        else
        {
            $result['roomno']='';
            $result['id']='';  
            $result['ser']=[];  
            $result['roomc']='';
            $result['rimg']=[];
            $result['rdesc']='';
            $result['price']='';
        }
        $result['data']=DB::table('categories')->where('cstatus',1)->get();
        $result['services']=DB::table('roomservices')->where('rstatus',1)->get();
        return view("admin.manage_room",$result);

    }
     
     public function manage_room_process(Request $request)
    {
        //return $request->post();
         // $request->validate([
         //  'RoomNo'=>'required|unique:categories,roomno,'.$request->post('id'),    
         // ]);
          
         if($request->post('id')>0){
            $model=room::find($request->post('id'));
            $msg="Room Updated";
             if($request->hasfile('image'))
              {
                  foreach($request->file('image') as $file)
                  {
                      $name = time().'.'.$file->extension();
                      $file->move(public_path().'/roomimages/', $name);  
                      $data[] = $name;  
                  }
                   $images='';
                $count=count($data);
                for($i=0;$i<$count;$i++){
                  $images=$images."////".$data[$i];
                }
        
                 $model->rimg=$images;
                 }
              }
       
               
         else{
              $model=new room();
              $msg="Room Added";
               if($request->hasfile('image'))
                {
                 foreach($request->file('image') as $file)
                 {
                     $name = time().'.'.$file->extension();
                     $file->move(public_path().'/roomimages/', $name);  
                     $data[] = $name;  
                 }
              }
       
               $images='';
               $count=count($data);
               for($i=0;$i<$count;$i++){
                   $images=$images."////".$data[$i];
               }
         
                 $model->rimg=$images;
         }
        
         $ser=$request->post('services');
         $c=count($ser);
         $str='';
         for($i=0;$i<$c;$i++){
            $str=$str.'///'.$ser[$i];
         }
         $model->rs=$str;
         $model->roomc=$request->post('rc');
         $model->roomno=$request->post('RoomNo');
         $model->rdesc=$request->post('rdesc');
         $model->price=$request->post('price');
         $model->roomstatus=1;
         $model->save();
         $request->session()->flash('message',$msg);
         return redirect('admin/room');
    }

  
    public function delete(Request $request, $id)
    {
        $model=room::find($id);
        $model->delete();
        $request->session()->flash('message','Room Deleted');
       return redirect('admin/room');
    }


     public function status(Request $request,$status,$id)
    {
        $model=room::find($id);
        $model->roomstatus=$status;
        $model->save();
        $request->session()->flash('message','Room Status Updated');
        return redirect('admin/room');

    }
   
    
}
