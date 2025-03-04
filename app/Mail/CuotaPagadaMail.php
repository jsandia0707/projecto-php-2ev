<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cuota;
use Barryvdh\DomPDF\Facade\Pdf;

class CuotaPagadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cuota;
    public $pdf;
    /**
     * Create a new message instance.
     */
    public function __construct(Cuota $cuota, $pdf)
    {
        $this->cuota = $cuota;
        $this->pdf = $pdf;
    }
    public function build()
    {
        return $this->subject('Confirmación de pago de cuota')
                    ->view('emails.cuota_pagada')
                    ->attachData($this->pdf->output(), 'cuota_' . $this->cuota->id_cuota . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }

}
