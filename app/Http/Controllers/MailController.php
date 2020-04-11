<?php

namespace App\Http\Controllers;
use Mail;
use DB;
use App\Offre;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   public function html_email() {
    //Fonctionne en dur
     /* $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('pelletier.ft1@gmail.com', 'Careers - Lycée Pasteur Mond Roland')
         ->subject ('Nouvelle offre d\'emplois disponible');
         $message->from('tplaravel284@gmail.com','Careers - Lycée Pasteur Mond Roland');
      });*/
      // Fin fonctionne en dur
     /* $offre = new Offre;
      $offre_id = request()->route()->parameter('id');
      dd($offre_id,$offre->id);

     $mailuserget=DB::table('users')->select('email')->whereNotNull('email')->pluck('email');
      foreach ($mailuserget as $mailuser) {

      Mail::send('mail',[], function ($message) use ($mailuser, $offre){
            $message->to($mailuser)
            ->subject('Nouvelle offre d\'emplois disponible');
            $message->from('tplaravel284@gmail.com','Careers - Lycée Pasteur Mond Roland');
          });
        }
*/
   // return redirect()->route('mail.send');
    //return redirect()->route('offres.index')->withStatus(__('Offre créée avec succès. Un mail a été envoyé à l\'ensemble des utilisateurs.'));

   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('tplaravel284@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('tplaravel284@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
}