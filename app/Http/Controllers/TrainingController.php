<?php

namespace App\Http\Controllers;

use App\Training;
use App\Presence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class TrainingController extends Controller {

    public function showTraining(){
        $training = DB::table('trainershaspresences')
            ->join('presence', 'trainershaspresences.presence_id', '=', 'presence.id')
            ->join('trainer', 'trainershaspresences.trainer_id', '=', 'trainer.id')
            ->join('personal', 'trainer.pe_id', '=', 'personal.id')
            ->select('presence.id', 'day', 'start', 'end', 'presence.kidsage', 'type', 'name', 'prename', 'position')
            ->get();
        echo json_encode($training);
    }

    public function training(){
        $trainings = DB::table('presence')
            ->get();

        $tarray=array();

        array_push($tarray, $trainings);

        echo json_encode($tarray);

    }

}
