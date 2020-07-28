<?php

namespace App;

use DateTime;

class Paginated
{
    
    
    public function previousWeek(int $day,int $month,int $year): DateTime
    {
        $week = new DateTime("{$day}-{$month}-{$year}");
        $week = $week->modify('previous monday');
        
        return $week;
    }

    public function nextWeek(int $day,int $month, $year): DateTime
    {
        $week = new DateTime("{$day}-{$month}-{$year}");
        $week = $week->modify('next monday');
        return $week;
    }

}