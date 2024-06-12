<?php

namespace App;

use App\Models\Puntos_gps;

class CsvUploadFile
{
    protected $timeHandler;

    public function __construct(TimeHandler $timeHandler)
    {
        $this->timeHandler = $timeHandler;
    }

    public function process($file)
    {
        $records = file($file);

        foreach ($records as $record) {
            $recordArray = explode(',', $record);
            $geo = explode(';', $recordArray[5]);

            Puntos_gps::create([
                "dispositivo"   => $recordArray[0],
                "imei"          => $recordArray[1],
                "tiempo"        => $this->timeHandler->formatTime($recordArray[2]),
                "placa"         => $this->extractPlate($recordArray[4]),
                "version"       => $this->extractVersion($recordArray[4]),
                "longitud"      => $this->sanitizeLatLong($geo[2]),
                "latitud"       => $this->sanitizeLatLong($geo[3]),
                "fecha_recepcion" => $this->extractRegisteredDate($recordArray[8]),
            ]);
        }
    }

    protected function sanitizeLatLong($coordinate)
    {
        $cardial = substr($coordinate, 0, 1);

        $value = (float)substr($coordinate, 1);
        $value = ($cardial == 'N' || $cardial == 'E') ? $value : -$value;

        return intval($value * 1000000);
    }

    protected function extractPlate($value)
    {
        $startPos = strpos($value, ':') + 1;
        $endPos = strpos($value, ';');
        return substr($value, $startPos, $endPos - $startPos);
    }

    protected function extractVersion($value)
    {
        $versions = explode(';', $value);
        return count($versions) > 1 ? $versions[1] : null; // Devuelve la segunda parte si existe, de lo contrario, null
    }

    protected function extractRegisteredDate($value)
    {
        $startPos = strpos($value, '[') + 1;
        $endPos = strpos($value, ']');
        return substr($value, $startPos, $endPos - $startPos);
    }
}
