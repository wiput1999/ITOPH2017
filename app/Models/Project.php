<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = ['team_name', 'school', 'teacher_prefix',  'teacher_name', 'teacher_surname',
        'teacher_phone', 'teacher_email', 'idea', 'idea_desc', 'bizcanvas', 'storyboard'];

    public function getMemberAttribute($value) {
        return json_decode($value, true);
    }
}
