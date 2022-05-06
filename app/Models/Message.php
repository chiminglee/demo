<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Message extends Model
{
    use HasFactory;

    public static function findWhithUsers() {
        $messages = DB::table('messages')
                ->join('users', 'users.id', '=', 'messages.user_id')
                ->select('messages.*', 'users.name')
                ->get();
        return $messages;
    }
}
