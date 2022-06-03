<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backEnd\SmtpEmail;
class SmtpEmailController extends Controller
{
    public function view(){
        $data['allData'] = SmtpEmail::all();
        return view('backEnd.smtpemail.manage-email',$data);
    }
    public function store(Request $request){
        
    
        $data = new SmtpEmail();
        $data->email = $request->email;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;              
    }

    public function edit($id){
        $data['editData'] = SmtpEmail::findOrFail($id);
        $data['allData'] = SmtpEmail::all();
        return view('backEnd.smtpemail.manage-email',$data);
    }
    public function update(Request $request){
        
    	$this->validate($request,[
    		'email' =>'required|unique:smtp_emails|max:15,title'
    	]);
        $data = SmtpEmail::findOrFail($request->id);
        $data->email = $request->email;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','Updated sucessfully');
        else:
            return redirect()->back()->with('danger','Updated unsucessfully');
        endif;  

    }
    public function delete($id){
        $result = SmtpEmail::destroy($id);
        if($result):
            return redirect()->back()->with('success','Deleted sucessfully');
        else:
            return redirect()->back()->with('danger','Deleted unsucessfully');
        endif;  
    }
    
}
