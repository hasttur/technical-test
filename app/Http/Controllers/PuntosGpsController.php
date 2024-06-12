<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\CsvUploadFile;
use App\Models\Puntos_gps;

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
    public function store(Request $request, CsvUploadFile $csvProcessor)
    {
        $request->validate([
            'upload_csv' => 'required|mimes:csv'
        ]);

        $csvProcessor->process($request->file('upload_csv'));

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
}
