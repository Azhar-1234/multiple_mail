<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function view(){
        $data['allData'] =  User::all();
        return view('backEnd.user.user-view',$data);
    }
    public function store(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->role = $request->role;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;              
    }
    public function edit($id){
        $data['editData'] = User::findOrFail($id);
        $data['allData']  = User::all();
        return view('backEnd.user.user-view',$data);
    }
    public function update(Request $request){
        $data = User::findOrFail($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->role = $request->role;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','updated sucessfully');
        else:
            return redirect()->back()->with('danger','updated unsucessfully');
        endif;              

    }
    public function delete($id){
        $result = User::destroy($id);
        if($result):
            return redirect()->back()->with('success','updated sucessfully');
        else:
            return redirect()->back()->with('danger','updated unsucessfully');
        endif;              

    }
}
