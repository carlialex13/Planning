<?php

namespace App\Date;

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

    public function day(?int $week=NULL, ?int $month=NULL, ?int $year=NULL): DateTime
    {   
        if($month === NULL || $month <1 || $month > 12 && $year === NULL || $year <1970 && $week === NULL || $week < 1 || $week > 54){
            $week = intval(date('W'));
            $month = intval(date('m'));
            $year = intval(date('Y'));
            $day = intval(date('d'));
            
        }
        return new DateTime("{$this->year}-{$this->month}-$day");
        
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
        return date_diff($this->FirstDayYear(), $this->LastDayYear());
    }
    
    
    public function addWeek($int): int
    {
		
        return $this->day()->modify('+' . (($int - $int)  +1 ) . 'week')->format('W');
    }

    public function subWeek($int): string
    {
        
		// to do : condition si semaine < 1 et si semaine > 53
        return $this->day()->modify('-' . $int . 'week')->format('W');
    }

    public function week(): string
    {
        return $this->day()->format('W');
    }

    /* public function formatWeek(): string
    {
        return $this->addWeek()->format('W');
    } */

    public function dayOfWeek(): string
    {
        for($i = 0 ; $i < 7; $i++){
            $firstDays = $this->day()->modify('last monday')->add(new DateInterval('P0' . $i . 'D'))->format('l d');
            echo "<th> $firstDays </th>";
        }      
        return $firstDays;
    }

    public function nextWeek()
    {

    }
}