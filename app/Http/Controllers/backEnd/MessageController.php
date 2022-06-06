<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backEnd\Message;

class MessageController extends Controller
{
    public function view(){
        $data['allData'] = Message::all();
        return view('backEnd.message.message-manage',$data);
    }
    public function store(Request $request){       
        $data = new Message();
        $data->name = $request->name;
        $result = $data->save();
        if($result):
            return redirect()->back()->with('success','inserted sucessfully');
        else:
            return redirect()->back()->with('danger','inserted unsucessfully');
        endif;              
    }

    public function edit($id){
        $data['editData'] = Message::findOrFail($id);
        $data['allData'] = Message::all();
        return view('backEnd.message.message-manage',$data);
    }
    public function update(Request $request){
        $data = Message::findOrFail($request->id);
        $data->name = $request->name;
        $result = $data->save();
        if($result):
            return redirect('view-message')->with('success','Updated sucessfully');
        else:
            return redirect()->back()->with('danger','Updated unsucessfully');
        endif;  

    }
    public function delete($id){
        $result = Message::destroy($id);
        if($result):
            return redirect()->back()->with('success','Deleted sucessfully');
        else:
            return redirect()->back()->with('danger','Deleted unsucessfully');
        endif;  
    }
}
