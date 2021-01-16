<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyCollaborators extends Mailable
{
    use Queueable, SerializesModels;

    public $company_name;
    public $count_collaborator;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company_name,$count_collaborator)
    {
        $this->company_name = $company_name;
        $this->count_collaborator = $count_collaborator;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.company_collaborator');
    }
}
