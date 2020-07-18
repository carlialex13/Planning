<?php

namespace App\Date;

use DateTime;
use DateInterval;

class Calendrier
{    

    public function Day(): DateTime
    {
        return new DateTime();
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
    public function Weeks (): DateTime
    {
        return $this->FirstDayYear()->add(new DateInterval('P01W'));
    }

    public function FormatWeek(): string
    {
        return $this->Weeks()->format('W');
    }

    public function DayOfWeek(): string
    {
        for($i = 0 ; $i < 7; $i++){
            $firstDays = $this->Weeks()->modify('last monday')->add(new DateInterval('P0' . $i . 'D'))->format('l d');
            echo "<th> $firstDays </th>";
        }      
        return $firstDays;
    }
}