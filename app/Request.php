<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Request extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function status(){
        return $this->belongto('App\Status');
    }

    public static function getAllPendingRequest(){
        return DB::table('users')
            -> join('requests','users.id','=','requests.user_id')
            ->join('statuses','statuses.id','=', 'status_id')
            ->where('statuses.id','=','1')
            ->select('users.name','users.email','users.id as user_id','requests.note','requests.id as request_id')
            ->get();
    }

    public static function getRequestById($id){
        return DB::table('users')
            -> join('requests','users.id','=','requests.user_id')
            ->join('statuses','statuses.id','=', 'status_id')
            ->where('requests.id','=', $id)
            ->select('users.name','users.email','users.id as user_id','requests.note','requests.id as request_id')
            ->first();
    }
}
