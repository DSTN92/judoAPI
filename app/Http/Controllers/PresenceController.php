<?php

namespace App\Http\Controllers;

use App\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller {

    public function showAllPresence() {
        echo json_encode(Presence::all());
    }

    public function showOnePresence($id) {
        echo json_encode(Presence::find($id));
    }

}
