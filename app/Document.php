<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model{

    protected $table = 'docs';
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
