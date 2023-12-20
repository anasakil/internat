<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EtudiantNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $etudiant;

    public function __construct($etudiant)
    {
        $this->etudiant = $etudiant;
    }

    public function build()
    {
        return $this->view('emails.etudiant_notification')
                    ->subject('Notification for Etudiant')
                    ->with(['etudiant' => $this->etudiant]); // Pass the $etudiant variable to the view
    }
}
