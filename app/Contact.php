<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{

    protected $table = 'contact';
    public $timestamps = false;

    protected $informations = [
        'id',
        'email',
        'pe_id',
        'phone',
        'street',
        'place'
    ];

    protected $hidden = [];

}
