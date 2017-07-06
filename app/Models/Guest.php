<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    protected $appends = ['code', 'type'];

    protected $fillable = ['prefix', 'name', 'surname', 'gender', 'age',
        'career', 'province', 'phone', 'email', 'facebook', 'twitter', 'news'];

    public function getTypeAttribute() {
        return 1;
    }

    public function getCodeAttribute() {
        return '1'.str_pad($this->id,4,"0",STR_PAD_LEFT);
    }
}
