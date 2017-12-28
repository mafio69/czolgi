<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontaktController extends Controller
{
    public function send(Request $req)
    {
        $niceNames = [  //nazwy dla pól formularza
            'email' => 'Email',
            'tresc' => 'Treść',
        ];
        $rules = [  //zasady walidacji
            'email' => 'required|email',
            'tresc' => 'min:10',
        ];
        $message = [ //wiadomości wyswietlane
            'required' => 'Pole :attribute jest wymagane.',
            'min' => 'Pole :attribute  musi mieć minimum :min znaków.',
        ];
        $this->validate($req, $rules, $message, $niceNames);
        $to = 'mf1969@gmail.com';
        $subject = 'Kontakt z strony';
        $message = $req->input('tresc')." \r\n".$req->input('email');
        $headers = 'From: '.$req->input('email') . "\r\n" .
            'Reply-To:' . $req->input('email') . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $email = mail($to, $subject, $message, $headers);
        if ($email) {
            $message = 'Email wysłany';
        } else {
            $message = 'Problem z strony serwera , nie udało się wysłać emaila';
        }


        return response()->json($message);
    }
}
