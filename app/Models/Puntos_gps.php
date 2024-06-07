<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntos_gps extends Model
{
    use HasFactory;

    protected $fillable = [
        "dispositivo",
        "imei",
        "tiempo",
        "placa",
        "version",
        "longitud",
        "latitud",
        "fecha_recepcion",
    ];
}
