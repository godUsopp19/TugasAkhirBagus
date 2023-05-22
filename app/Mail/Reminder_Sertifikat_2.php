<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Models\Karyawan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reminder_Sertifikat_2 extends Mailable
{
    use Queueable, SerializesModels;

    protected $penerima2;
    protected $karyawans2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($penerima2)
    {
        $this->penerima2 = $penerima2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emailreminder2')->with('penerima2', $this->penerima2);
    }
}
