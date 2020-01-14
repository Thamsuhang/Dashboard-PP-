<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Privilege;
use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends BackendController
{
    public function index()
    {
        $this->data('adminData',Admin::all());
        $this->data('title',$this->title('users'));
        return view($this->_pagePath.'users.users',$this->data);
    }

    public function addUser()
    {
        $this->data('privilegeData',Privilege::where('status','=','1')->get());
        $this->data('title',$this->title('Add-users'));
        return view($this->_pagePath.'users.add-user',$this->data);
    }

    public function addUserAction(Request $request)
    {
        if ($request->isMethod('GET')){
            $this->data('privilegeData',Privilege::where('status','=','1')->get());
            $this->data('title',$this->title('Add-users'));
            return view($this->_pagePath.'users.add-user',$this->data);
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
               'name'=> 'required|min:3|max:30|',
                'username'=>'required|min:3|max:30|unique:admins,username',
                'email'=>'required|email|unique:admins,email',
                'password'=>'required|min:5|max:20|confirmed',
                'upload'=>'required|mimes:jpg,jpeg,png,gif,svg',

            ]);

            $admin=new Admin();
            $admin->name=$request->name;
            $admin->username=$request->username;
            $admin->email=$request->email;
            $admin->password=bcrypt($request->password);
            if ($request->hasFile('upload'))
            {
                $file=$request->file('upload');
                $ext=$file->getClientOriginalExtension();
                $imageName=Str::random().'.'.$ext;
                $UploadPath=public_path('lib/uploads/users');
                if(!$file->move($UploadPath,$imageName)) return redirect()->back();
                $admin->image=$imageName;
            }

            $privilegeId= $request->privilege;
            $totalPrivilegeId=count($privilegeId);
            $increment=0;

            if($admin->save()){
                $lastInsertedId=$admin->id;
                foreach ($privilegeId as $id)
                {
                    $pri['admin_id']=$lastInsertedId;
                    $pri['privilege_id']=$id;
                    $pri['created_at']=Carbon::now()->toDateTimeString();
                    $pri['updated_at']=Carbon::now()->toDateTimeString();

                    if (DB::table('manage_privileges')->insert($pri))
                    {
                        $increment++;
                    }
                    if ($totalPrivilegeId==$increment)
                    {
                        return redirect()->route('users')->with('success','User has been successfully added');
                    }
                }
            }
        }

    }

    public function deleteWithFile($criteria)
    {
        $id=$criteria;
        $findData=Admin::findOrFail($id);
        $fileName= $findData->image;
        $deleteFilePath=public_path('lib/uploads/users/'.$fileName);
        if(file_exists($deleteFilePath) && is_file($deleteFilePath))
        {
            return unlink($deleteFilePath);
        }
        return true;

    }

    public function deleteUser(Request $request)
    {
        $id= $request->id;
        DB::table('manage_privileges')->where('admin_id','=',$id)->delete();
        $findData= Admin::findOrFail($id);
        if($this->deleteWithFile($id)&& $findData->delete())
        {
            return redirect()->intended(route('users'))->with('success','user was deleted successfully');
        }
    }

    public function userLogin(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->_backendPath . 'login.login');
        }

        if ($request->isMethod('post')) {

            $username = $request->username;
            $password = $request->password;
            $remember=isset($request->remember)? true:false ;
            if (Auth::attempt(['username'=>$username,'password'=>$password],$remember)) {
                return redirect()->intended(route('dashboard'));
            } else {
               return redirect()->back();
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('userLogin'));


    }




}
