<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestStudent extends Model
{
    protected $appends = ['code', 'type'];

    protected $table = 'guest_student';

    protected $fillable = ['prefix', 'name', 'surname', 'gender', 'age', 'major',
        'branch', 'degree', 'province', 'phone', 'email', 'facebook', 'twitter', 'news'];

    public function getTypeAttribute() {
        return 2;
    }

    public function getCodeAttribute() {
        return '2'.str_pad($this->id,4,"0",STR_PAD_LEFT);
    }
}
