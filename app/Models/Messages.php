<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'user_id',
        'message',
        'file_path',
        'file_name',
        'send_date',
        'type',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function chat(){
        return $this->belongsTo(Chats::class);
    }

    public function createMessage($request){
        return (new static)::create([
            'chat_id' => $request->chat_id,
            'user_id' => $request->user_id,
            'message' => $request->message,
            'send_date' => Carbon::now()
        ]);
    }
}
