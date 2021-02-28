<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {

    public function showAllContacts() {
        echo json_encode(Contact::all());
    }

    public function showOneContact($id) {
        echo json_encode(Contact::find($id));
    }

}
