<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactMail extends Mailable
{
    use SerializesModels;

    public $contact;

    /**
     * Tạo một thể hiện mới của lớp Mailable.
     *
     * @param  Contact  $contact
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Xây dựng nội dung email.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Gửi biểu mẫu liên hệ mới')
                    ->view('emails.contact'); 
    }
}
