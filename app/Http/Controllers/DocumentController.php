<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller {

    public function showAllDocuments() {
        echo json_encode(Document::all());
    }

    public function showOneDocument($id) {
        echo json_encode(Document::find($id));
    }

    public function showAllNews(){
        echo json_encode(Document::all()->where("category", "=", "news"));
    }

    public function showAllFormulare(){
        echo json_encode(Document::all()->where("category", "=", "formular"));
    }

    public function showArchive(){
        echo json_encode(Document::all()->where("category", "=", "archiv"));
    }

}
