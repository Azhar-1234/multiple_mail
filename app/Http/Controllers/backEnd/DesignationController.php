<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backEnd\Designation;

class DesignationController extends Controller
{
    public function view(){
        $data['allData'] = Designation::all();
        return view('backEnd.designation.designation-view',$data);
    }
    public function store(Request $request){
        
    	$this->validate($request,[
    		'title' =>'required|unique:designations|max:15,title'
    	]);
        $data = new Designation();
        $data->title = $request->title;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;              
    }

    public function edit($id){
        $data['editData'] = Designation::findOrFail($id);
        $data['allData'] = Designation::all();
        return view('backEnd.designation.designation-view',$data);
    }
    public function update(Request $request){
        
    	$this->validate($request,[
    		'title' =>'required|unique:designations|max:15,title'
    	]);
        $data = Designation::findOrFail($request->id);
        $data->title = $request->title;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','Updated sucessfully');
        else:
            return redirect()->back()->with('danger','Updated unsucessfully');
        endif;  

    }
    public function delete($id){
        $result = Designation::destroy($id);
        if($result):
            return redirect()->back()->with('success','Deleted sucessfully');
        else:
            return redirect()->back()->with('danger','Deleted unsucessfully');
        endif;  
    }
}
