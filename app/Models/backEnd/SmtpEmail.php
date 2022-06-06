<?php

namespace App\Models\backEnd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backEnd\Message;

class SmtpEmail extends Model
{
    use HasFactory;
    public function message()
    {
        return $this->belongsTo(Message::class,'message_id','id');
    }
    public function message_id(){
        return $this->belongsTo(Message::class, "id");
    }
}
