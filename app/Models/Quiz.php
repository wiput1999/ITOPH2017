<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'itquiz';

    protected $fillable = ['team_name', 'member', 'school', 'school_addr', 'school_province', 'teacher_prefix',
        'teacher_name', 'teacher_surname', 'teacher_email', 'teacher_phone'];

    public function getMemberAttribute($value) {
        return json_decode($value, true);
    }
}
