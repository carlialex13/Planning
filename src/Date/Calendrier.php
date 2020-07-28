<?php

namespace App\Date;

use App\Parse;
use DateTime;
use DateInterval;

class Calendrier
{   

    private $week;
    private $month;
    private $year;


    public function __construct(?int $week=NULL, ?int $month=NULL, ?int $year=NULL)
    {
        if($week === NULL || $week < 1 || $week > 54){
            $week = intval(date('W'));
        }

        if($month === NULL || $month < 1 || $month > 12){
            $month = intval(date('m'));
          }
    
        if($year === NULL){
            $year = intval(date ('Y'));
          }
    
        if($year < 1970) {
            throw new \Exception ("L'année $year est inférieur à 1970");
          }
        
        $this->week = $week;
        $this->month = $month;
        $this->year = $year;   
    }

    public function day(int $day, int $month, int $year): DateTime
    {   
        $day = new DateTime("$day-$month-$year");
        return $day;
    }

    public function firstDayYear(): DateTime
    {
        return new DateTime('2020-01-01');
    }
    
    public function lastDayYear(): DateTime
    {
        return new DateTime('2020-12-31');
    }
    
    public function numberDayYear(): DateInterval
    {
        $interval = $this->firstDayYear()->diff($this->lastDayYear());
        return $interval;
        
    }

    public function formatDay(): string
    {   
        $weeks = [($this->numberDayYear()->days) / 7];
        foreach($weeks as $week){
            for($i = 0 ; $i < 7; $i++){
                $week = $this->day()->modify('last monday')->add(new DateInterval('P0' . $i . 'D'))->format('d-m-Y');
                echo "<th> $week </th>";
            }
        }
        return $week;  
        /* si le jour d'ajourdh'ui === Lundi alors ajoute directement 7 * $i
        sinon prends le lundi et ajoute 7 * $i */
    }
}