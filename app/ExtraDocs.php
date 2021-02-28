<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraDocs extends Model{

    protected $table = 'file';
    public $timestamps = false;

    protected $informations = [
        'id',
        'name',
        'type',
        'doc_path',
        'doc_release'
    ];

    protected $hidden = [];

}
