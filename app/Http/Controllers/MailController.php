<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller {

    public function sendMail(Request $request){

        $all=$request->all();
        $msg=$all['msg'];
        $name=$all['name'];
        $prename=$all['prename'];
        $staffmember=$all['staffmember'];
        $email=$all['email'];

        //echo json_encode($mail);

          // ======= Konfiguration:
          $who=$name.' '.$prename.' via TaiKien_Webmailer';

          $mailTo = $staffmember;
          $mailFrom = $email;
          $mailSubject   = 'Webseite';

          $headers   = array();
          $headers[] = "MIME-Version: 1.0";
          $headers[] = "Content-type: text/plain; charset=utf-8";
          $headers[] = "Von: {$mailFrom}";

          // ======= Text der Mail aus den Formularfeldern erstellen:

                    $mailText ="Von: " . $who . "\n\n";
                    $mailText .="Nachricht: \n" . $msg . "\n";
                    $mailText .="Email: " . $mailFrom;

          // ======= Korrekturen vor dem Mailversand

          // ======= Mailversand

          // Mail versenden und Versanderfolg merken
          $mailSent = @mail($mailTo, $mailSubject, $mailText,implode("\r\n",$headers));

          // ======= Return-Seite an den Browser senden
          $errorArray = array();
          $errorArray["message"] = "";
          // Wenn der Mailversand erfolgreich war:
          if($mailSent == TRUE) {
             // Seite "Formular verarbeitet" senden:
             http_response_code(200);
             echo json_encode($mailSent);
          }
          // Wenn die Mail nicht versendet werden konnte:
          else {
             // Seite "Fehler aufgetreten" senden:
             //header("Location: " . $returnErrorPage);
             http_response_code(400);
             $errorArray["message"] .= "cant see data";
             echo json_encode($postdata);
          }

    }

}
