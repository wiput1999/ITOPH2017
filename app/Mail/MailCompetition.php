<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCompetition extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;
    public $competition;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $data, $competition)
    {
        $this->data = $data;
        $this->competition = $competition;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        Esport
        if ($this->competition == "esport") {
            return $this->markdown('emails.esport')
                ->from("postmaster@sandbox743371d889b143c098b1a6d077c16fb2.mailgun.org", "IT Ladkrabang Openhouse")
                ->subject("การแข่งขันกีฬาอิเล็กทรอนิกส์(E-Sports) | IT Ladkrabang Openhouse 2017");
        }
//        Network
        else if ($this->competition == "network") {
            return $this->markdown('emails.network')
                ->from("postmaster@sandbox743371d889b143c098b1a6d077c16fb2.mailgun.org", "IT Ladkrabang Openhouse")
                ->subject("ความปลอดภัยของระบบคอมพิวเตอร์ | IT Ladkrabang Openhouse 2017");
        }
//        Project IT
        else if ($this->competition == "projectit") {
            return $this->markdown('emails.projectit')
                ->from("postmaster@sandbox743371d889b143c098b1a6d077c16fb2.mailgun.org", "IT Ladkrabang Openhouse")
                ->subject("การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | IT Ladkrabang Openhouse 2017");
        }
//        PHP
        else if ($this->competition == "php") {
            return $this->markdown('emails.php')
                ->from("postmaster@sandbox743371d889b143c098b1a6d077c16fb2.mailgun.org", "IT Ladkrabang Openhouse")
                ->subject("การแข่งขันพัฒนาเว็บไซต์ด้วย PHP และ JavaScript | IT Ladkrabang Openhouse 2017");
        }
//        IT Quiz
        else if ($this->competition == "quiz") {
            return $this->markdown('emails.quiz')
                ->from("postmaster@sandbox743371d889b143c098b1a6d077c16fb2.mailgun.org", "IT Ladkrabang Openhouse")
                ->subject("การแข่งขันความปลอดภัยของระบบคอมพิวเตอร์ | IT Ladkrabang Openhouse 2017");
        }

    }
}
