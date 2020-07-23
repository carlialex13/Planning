<?php

namespace App;

use App\Date\Calendrier;
use DateInterval;
use DateTime;

class Paginated
{
    public function previousLink()
    {
        $week = new Calendrier();
        $week = $week->day()->modify("previous week")->format('W');
        return $week;
    }

    public function nextLink()
    {
        $week = new DateTime();
        $week = $week->add(new DateInterval('P01W'))->format('W');
        
        return $week;
    }

}