<?php

namespace App\Modelo;

class Acceso extends \Eloquent {

    protected $table = "accesos";
    protected $guarded = array('fecha');
    public $primaryKey = 'pk';
    public $timestamps = false;

    public function usuario() {
        return $this->hasOne('Usuario', 'usuario_fk');
    }

}

?>
