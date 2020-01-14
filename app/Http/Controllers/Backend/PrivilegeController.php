<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PrivilegeController extends BackendController
{
    public function index()
    {
        $this->data('privilegeData', Privilege::orderBy('id', 'DESC')->get());
        return view($this->_pagePath . 'privileges.privilege', $this->data);
    }

    public function addPrivilege(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('Post')) {
            $this->validate($request, [
                'privilege_name' => 'required|min:3|max:30|unique:privileges,privilege_name'
            ]);
            $privilegeObject = new Privilege();
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->save()) {
                return redirect()->route('privilege')->with('success', 'Privilege was succesfully added');
            }


        }
    }

    public function deletePrivilege($criteria)
    {

        $id = $criteria;
        if (DB::table('privileges')->where('id', '=', $id)->delete()) {
            return redirect()->route('privilege')->with('success', 'Privilege was succesfully deleted');
        };
    }

    public function editPrivilege($id)
    {

        $findData = Privilege::findOrFail($id);
        $this->data('privilegeData', $findData);
        return view($this->_pagePath . 'privileges.edit-privilege', $this->data);

    }
    public function editPrivilegeAction(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('Post')) {
            $criteria=$request->criteria;
            $this->validate($request, [
                'privilege_name' => 'required|min:3|max:30|',[
                    Rule::unique('privileges','privilege_name')->ignore($criteria)
                ]
            ]);
            $privilegeObject = Privilege::findOrFail($criteria);
            $privilegeObject->privilege_name = $request->privilege_name;
            if ($privilegeObject->update()) {
                return redirect()->route('privilege')->with('success', 'Privilege was successfully added');
            }


        }

    }
    public function updatePrivilegeStatus(Request $request)
    {
        if ($request->isMethod('get')) return redirect()->back();
        if ($request->isMethod('Post')) {
            $criteria=$request->criteria;
            $privilegeObj= Privilege::findOrFail($criteria);
           if(isset($_POST['active']))
           {
               $message='status updated to inactive';
                $privilegeObj->status=0;

           }
           if(isset($_POST['inactive']))
           {
               $message='status updated to active';
               $privilegeObj->status=1;
           }
           if ($privilegeObj->update())
           {
               return redirect()->route('privilege')->with('success', $message);
           }


        }

    }

}
