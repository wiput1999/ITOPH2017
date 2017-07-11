<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailGuest extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $type;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $data, $type)
    {
        $this->name = $name;
        $this->data = $data;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type == "guest") {
            return $this->markdown('emails.guest')
                ->from("openhouse@it.kmitl.ac.th", "IT Ladkrabang Openhouse")
                ->subject("ยืนยันการลงทะเบียนเข้าร่วมงาน | IT Ladkrabang Openhouse 2017");
        } else if ($this->type == "student") {
            return $this->markdown('emails.student')
                ->from("openhouse@it.kmitl.ac.th", "IT Ladkrabang Openhouse")
                ->subject("ยืนยันการลงทะเบียนเข้าร่วมงาน | IT Ladkrabang Openhouse 2017");
        } else if ($this->type == "school") {
            return $this->markdown('emails.school')
                ->from("openhouse@it.kmitl.ac.th", "IT Ladkrabang Openhouse")
                ->subject("ยืนยันการลงทะเบียนเข้าร่วมงาน | IT Ladkrabang Openhouse 2017");
        }
    }
}
