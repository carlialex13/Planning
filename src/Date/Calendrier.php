<?php

namespace App\Date;

use DateTime;
use DateInterval;
use DateTimeZone;

class Calendrier
{    

    public function Day(): DateTime
    {
        return new DateTime(' ',  new DateTimeZone('Europe/Paris'));
    }


    /**
     * Premier jour de l'année
     *
     * @return DateTime
     */
    public function FirstDayYear (): DateTime
    {
        return new DateTime('2020-01-01');
    }
    
    /**
     * Dernier jour de l'année
     *
     * @return DateTime
     */
    public function LastDayYear(): DateTime
    {
        return new DateTime('2020-12-31');
    }
    
    /**
     * Nombre de jour dans l'annnée
     *
     * @return DateInterval
     */
    public function NumberDayYear (): DateInterval
    {
        return date_diff($this->FirstDayYear(), $this->LastDayYear());
    }
    
    /**
     * Weeks
     *
     * @param  int $data
     * @return DateTime
     */
    public function addWeeks (): DateTime
    {
        return $this->FirstDayYear()->add(new DateInterval('P01W'));
    }

    public function Week(): string
    {
        return $this->day()->format('W');
    }

    public function FormatWeek(): string
    {
        return $this->addWeeks()->format('W');
    }

    public function DayOfWeek(): string
    {
        for($i = 0 ; $i < 7; $i++){
            $firstDays = $this->addWeeks()->modify('last monday')->add(new DateInterval('P0' . $i . 'D'))->format('l d');
            echo "<th> $firstDays </th>";
        }      
        return $firstDays;
    }
}