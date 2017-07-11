<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ESport extends Model
{
    protected $table = 'esport';

    protected $fillable = ['team_name', 'team_fb', 'school', 'school_addr', 'school_province', 'teacher_prefix',
        'teacher_name', 'teacher_surname', 'teacher_phone', 'teacher_email'];

    public function getMemberAttribute($value) {
        return json_decode($value, true);
    }
}
