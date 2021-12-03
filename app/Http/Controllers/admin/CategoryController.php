<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index(){
      $result['data']=DB::table('categories')->latest('id')->get();
      return view('Admin.category',$result);
    }
    public function manage_category(Request $request,$id="")
    {
          
        if($id>0){
            $arr=category::where(['id'=>$id])->get();
            $result['categoryname']=$arr['0']->categoryname;
            $result['id']=$arr['0']->id;
         
        }
        else
        {
            $result['categoryname']='';
            $result['id']='';     
        }
       
        return view("admin.manage_category",$result);

    }
     
     public function manage_category_process(Request $request)
    {
        
         $request->validate([
          'CategoryName'=>'required|unique:categories,categoryname,'.$request->post('id'),    
         ]);
          
         if($request->post('id')>0){
            $model=category::find($request->post('id'));
            $msg="Category Updated";
         }
         else{
            $model=new category();
            $msg="Category Added";
         }
        
         $model->categoryname=$request->post('CategoryName');
         $model->cstatus=1;
         $model->save();
         $request->session()->flash('message',$msg);
         return redirect('admin/category');
    }

  
    public function delete(Request $request, $id)
    {
        $model=category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
       return redirect('admin/category');
    }


     public function status(Request $request,$status,$id)
    {
        $model=category::find($id);
        $model->cstatus=$status;
        $model->save();
        $request->session()->flash('message','Category Status Updated');
        return redirect('admin/category');

    }
   
}
