<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestSchool extends Model
{
    protected $appends = ['code', 'type'];

    protected $table = 'guest_school';

    protected $fillable = ['prefix', 'name', 'surname', 'gender', 'age', 'school',
        'follower', 'province', 'phone', 'email', 'facebook', 'twitter', 'news'];

    public function getTypeAttribute() {
        return 3;
    }

    public function getCodeAttribute() {
        return '3'.str_pad($this->id,4,"0",STR_PAD_LEFT);
    }
}
