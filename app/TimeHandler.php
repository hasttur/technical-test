<?php

namespace App;

class TimeHandler
{
    public function formatTime($timeString)
    {
        return \DateTime::createFromFormat('Hisdmy', $timeString)->format('Y-m-d H:i:s');
    }
}
