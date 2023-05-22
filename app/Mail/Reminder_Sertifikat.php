<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Karyawan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder_Sertifikat extends Mailable
{
    use Queueable, SerializesModels;

    protected $penerima;
    protected $karyawans;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($penerima)
    {
        $this->penerima = $penerima;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emailreminder')->with('penerima', $this->penerima);
    }
}
