<?php

namespace App\Http\Controllers;

use App\ExtraDocs;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ExtraDocumentController extends Controller {

    public function showExtraDocs(Request $request){

        if($request->has('role')){
            $role = $request->input('role');
            if($role == '1'){
                $extraDocs = DB::table('roleshasfiles')->where('role_id', '=', 1)
                    ->join('file', 'roleshasfiles.file_id', '=', 'file.id')
                    ->get();
                echo json_encode(['files' => $extraDocs]);
            }
            elseif($role == '2'){
                $extraDocs = DB::table('roleshasfiles')->where('role_id', '=', 2)
                    ->join('file', 'roleshasfiles.file_id', '=', 'file.id')
                    ->get();
                echo json_encode(['files' => $extraDocs]);
            }
            elseif($role == '3'){
                $extraDocs = DB::table('roleshasfiles')->where('role_id', '=', 3)
                    ->join('file', 'roleshasfiles.file_id', '=', 'file.id')
                    ->get();
                echo json_encode(['files' => $extraDocs]);
            }
            elseif($role == "1" && $role == '2'){
                $extraDocs = DB::table('roleshasfiles')->where('role_id', '<', 3)
                    ->join('file', 'roleshasfiles.file_id', '=', 'file.id')
                    ->get();
                echo json_encode(['files' => $extraDocs]);
            }

        }

    }
}
