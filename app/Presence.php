<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model{

    protected $table = 'presence';
    public $timestamps = false;

    protected $informations = [
        'id',
        't_id',
        'day',
        'start',
        'end',
        'type'
    ];

    protected $hidden = [];

}
