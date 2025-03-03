<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Cuota;

class CuotaPagadaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cuota;
    
    public function __construct(Cuota $cuota)
    {
        $this->cuota = $cuota;
    }
    public function build()
    {
        return $this->subject('Confirmación de pago de cuota')
                    ->view('cuotas.pdf');
    }

}
