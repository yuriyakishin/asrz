<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile', [
                'profile' => Auth::guard('admin')->user(),
        ]);
    }
    
    public function update(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        
        $admin = Admin::find($id);
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        //
        if(!empty($request->input('password'))) {
            $admin->password = Hash::make($request->input('password'));
        }
        //
        $photo = $request->file('photo');
        if(isset($photo))
        {
            $previewDir = 'images/uploads/photo/'.date('Y-m-d').'/';
            $preview = $previewDir . $photo->getClientOriginalName();
            $photo->move($previewDir,$photo->getClientOriginalName());
            $admin->photo = '/'.$preview;
        }
        
        $admin->save();
        
        
        \Session::flash('success_message','Информация сохранена');
        
        //
        return redirect()->route('admin.profile');
    }
}
