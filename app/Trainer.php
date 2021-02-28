<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model{

    protected $table = 'trainer';
    public $timestamps = false;

    protected $informations = [
        't_id',
        'pe_id',
        'license',
        'kidsage',
        'grade',
        'trainer_since',
        'motto'
    ];

    protected $hidden = [];

}
