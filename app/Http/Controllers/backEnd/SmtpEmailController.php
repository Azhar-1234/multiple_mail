<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backEnd\SmtpEmail;
use App\Models\backEnd\Message;
use App\Mail\TestUserMail;
use Mail;
use DB;

class SmtpEmailController extends Controller
{
    public function view(){
        $data = [];
        $data['allData'] = SmtpEmail::all();
        $data['messageData'] = Message::all();
     
        $data['emails'] = DB::table('smtp_emails')->get();
        return view('backEnd.smtpemail.manage-email',['emails'=>DB::table('smtp_emails')->get()],$data);
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
        $data['messageData'] = Message::all();
        return view('backEnd.smtpemail.manage-email',$data);
    }
    public function update(Request $request){
        $data = SmtpEmail::findOrFail($request->id);
        $data->email = $request->email;
        $result = $data->save();
        if($result):
            return redirect('view-email')->with('success','Updated sucessfully');
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
 
    public function sendMail(Request $request){  
    $users = SmtpEmail::count();
        
        if($request->send_email != null && $users != 0){
        
            $email = SmtpEmail::all();
            $email_lists = [];
            foreach($email as $value){
                $email_lists[] = $value->email;
            }
            
            $emailInfo = array(
                'message' => $email->data,
            );

            Mail::send('backEnd.smtpmail.manage-email',$emailInfo, function($message) use($email_lists,$emailInfo) {
                $message->from('ektechtest@gmail.com', 'EkTech');
                $message->to($email_lists);
                $message->subject('New news has been uploaded');
            });
        }
    }
}
