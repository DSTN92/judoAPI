<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller {

    public function showAllTrainers() {
        echo json_encode(Trainer::all());
    }

    public function showOneTrainer($id) {
        echo json_encode(Trainer::find($id));
    }

}
