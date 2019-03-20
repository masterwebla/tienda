<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductoCreado extends Mailable
{
    use Queueable, SerializesModels;
    public $nombre;
    public $cantidad;
    public $precio;
    
    public function __construct($nombrep,$cantidadp,$preciop)
    {
        $this->nombre = $nombrep;
        $this->cantidad = $cantidadp;
        $this->precio = $preciop;
    }

    
    public function build()
    {
        return $this->from('tienda@osmaro.com')
                    ->subject('Nuevo producto en la Tienda')
                    ->view('mails.producto');
    }
}
