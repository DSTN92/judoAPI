<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class PersonController extends Controller {

    public function showAllPersons(){
        $person = DB::table('personal')
            ->join('contact', 'personal.id', '=', 'contact.pe_id')
            ->leftJoin('trainer', 'personal.id', '=', 'trainer.pe_id')
            ->select('u_id', 'name', 'prename', 'birthday', 'member_since', 'img_path', 'council', 'license', 'grade', 'trainer_since', 'kidsage', 'motto', 'email', 'phone', 'street', 'place')
            ->get();
        echo json_encode ($person);
    }

    public function showTrainer(){
        $trainer = DB::table('trainer')
            ->join('personal', 'trainer.id', 'personal.id')
            ->join('contact', 'trainer.id', '=', 'contact.pe_id')
            ->select('name', 'prename', 'birthday', 'member_since', 'img_path', 'trainer.id', 'license', 'grade', 'trainer_since', 'kidsage', 'motto', 'email', 'phone')
            ->get();
        echo json_encode($trainer);
    }

    public function showCouncil(){
        $council = DB::table('personal')->where('council', '<>', '', 'and')
            ->join('contact', 'personal.id', '=', 'contact.pe_id')
            ->select('name', 'prename', 'birthday', 'member_since', 'img_path', 'council', 'email', 'phone')
            ->get();
        echo json_encode($council);
    }

    public function showOnePerson($id) {
        echo json_encode(Person::find($id));
    }

    public function tests(){

    }

}
