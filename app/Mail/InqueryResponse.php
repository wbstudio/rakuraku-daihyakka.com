<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InqueryResponse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='', $text='')
    {
        //
        $this->title = $text["title"];
        $this->text = $text["main"];
  
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->text('admin.inquery.resmail')
        ->text('admin.inquery.resmail')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
          ]);
    }
}
