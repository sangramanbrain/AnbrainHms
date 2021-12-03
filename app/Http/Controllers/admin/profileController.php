<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class profileController extends Controller
{
     public function profile()
    
    {
        $id=Auth::User()->id;
        $model['data']=User::where('id',$id)->get();
        
        return view('admin.profile',$model);
    }

     public function update(request $request)
    {

        $id=Auth::User()->id;
        $pwd=$request->post('npass');
        $repwd=$request->post('cpass');
        if($pwd!==$repwd){
            session()->flash('error',"Password Are Not Matching");
            return redirect('admin/profile');
        }

       $model1=User::find($id);

       if(Hash::check($request->post('opass'),$model1->password)){

        $model=User::find($id);
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        if($pwd=='' && $repwd=='')
        {
        $model->password=Hash::make($request->post('opass'));
        }
        else{
        $model->password=Hash::make($request->post('npass'));
        }
        $model->save();
        session()->flash('message','Profile Updated Successfully');
        return redirect('admin/profile');

       }
       else{
        session()->flash('error','Old Password Not Matched');
        return redirect('admin/profile');
       }

    }

}
