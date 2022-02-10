<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TanggapanMail extends Mailable
{
    public $tanggapan_email;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tanggapan_email)
    {
        $this->tanggapan_email = $tanggapan_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('vickyleonardo00@gmail.com')
                    ->subject('Pengaduan Masyarakat')
                    ->view('tanggapan');
    }
}
