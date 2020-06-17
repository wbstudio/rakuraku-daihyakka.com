<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InqueryReturn extends Mailable
{
    use Queueable, SerializesModels;
    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='', $text='')
    {
        //
        $this->title = sprintf('%sさん、お問い合わせありがとうございます。', $name);
        $this->text = $text;
  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('front.inquery.resmail')
        ->text('front.inquery.resmail')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
          ]);
    }
}
