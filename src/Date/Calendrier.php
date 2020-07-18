<?php

namespace App\Date;

use DateTime;
use DateInterval;

class Calendrier
{
    public function FirstDayYear (): DateTime
    {
        return new DateTime('2020-01-01');
    }

    public function LastDayYear(): DateTime
    {
        return new DateTime('2020-12-31');
    }

    public function NumberDayYear (): DateInterval
    {
        return date_diff($this->FirstDayYear(), $this->LastDayYear());
    }

    public function Weeks (): DateTime
    {
        return $this->FirstDayYear()->modify('+1 week');
    }

}