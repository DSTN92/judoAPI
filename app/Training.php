<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model{

    protected $table = 'trainershaspresences';
    public $timestamps = false;

    protected $informations = [
        'trainer_id',
        'presence_id'
    ];

    protected $hidden = [];

}
