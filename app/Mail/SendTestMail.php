<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $title;
    protected $text;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='テスト', $text='テストです。')
    {
        //
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->text = $text;
  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')
        ->text('emails.test')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
          ]);
}
}
