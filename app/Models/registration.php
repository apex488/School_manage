<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registration extends Model
{
    public function course(){
        return $this->belongsTo(course::class , 'course_name' );
    }
    public function user(){
        return $this->belongsTo(user::class , 'user_id' );
    }
}
