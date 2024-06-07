<?php

namespace App\Http\Controllers;

use App\Models\Puntos_gps;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PuntosGpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("upload_csv.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("upload_csv.create",);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'upload_csv' => 'required|mimes:csv'
        ]);

        $file = file($request->file('upload_csv'));

        foreach ($file as $record) {
            $record_array = explode(',', $record);
            $geo = explode(';', $record_array[5]);

            Puntos_gps::create([
                "dispositivo"   => $record_array[0],
                "imei"          => $record_array[1],
                "tiempo"        => \DateTime::createFromFormat('Hisdmy', $record_array[2])->format('Y-m-d H:i:s'),
                "placa"         => substr($record_array[4], strpos($record_array[4], ':') + 1, strpos($record_array[4], ';') - strpos($record_array[4], ':') - 1),
                "version"       => explode(';', $record_array[4])[1],
                "longitud"      => self::sanitizeLatLong($geo[2]),
                "latitud"       => self::sanitizeLatLong($geo[3]),
                "fecha_recepcion" => substr($record_array[8], strpos($record_array[8], '[') + 1, strpos($record_array[8], ']') - strpos($record_array[8], '[') - 1),
            ]);
        }

        return redirect("/")->with('response', 'Archivo cargado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Puntos_gps $puntos_gps)
    {
        $data = Puntos_gps::all();
        return view("upload_csv.map", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Puntos_gps $puntos_gps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Puntos_gps $puntos_gps)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Puntos_gps $puntos_gps)
    {
        //
    }

    public function sanitizeLatLong($coordinate) {
        $cardial = substr($coordinate, 0, 1);
    
        $value = (float)substr($coordinate, 1);    
        $value = ($cardial == 'N' || $cardial == 'E') ? $value : -$value;
        
        return intval($value * 1000000);
    }
}
