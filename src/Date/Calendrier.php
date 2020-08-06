<?php

namespace App\Date;

use App\Parse;
use DateTime;
use DateInterval;
use DatePeriod;

class Calendrier
{   
    private $day;
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
        return new DateTime('first day of this year');
    }
    
    public function lastDayYear(): DateTime
    {
        return new DateTime('last day of this year');
    }

    public function dayOfWeek(?int $day, ?int $month, ?int $year)
    {
        if($_SERVER['REQUEST_URI'] === '/'){
            $start = new DateTime();
            $start = $start->modify('monday this week');
        } else {
            $start  = new DateTime("$day-$month-$year");
        };
        
        $end  = (clone $start)->modify('monday next week');
        $days = new DatePeriod($start, new DateInterval('P1D'), $end);
        foreach ($days as $day) {
                echo "<th class=" . $day->format('d-m-Y') . " >" . $day->format('d-m-Y') . "</th>";
                $this->day = $day;   
            } 
    }

    public function numberDayYear(): DateInterval
    {
        $interval = $this->firstDayYear()->diff($this->lastDayYear());
        return $interval;
        
    }

    public function formatDay(int $day, int $month, int $year): string
    {   
        $weeks = [($this->numberDayYear()->days) / 7];
        
        
        if($this->day($day, $month, $year)->format('d-m-Y') === $this->day($day, $month, $year)->modify('monday this week')->format('d-m-Y')){
            foreach($weeks as $week){
                for($i = 0 ; $i < 7; $i++){
                    $week = [];
                    $week = $this->day($day, $month, $year)->add(new DateInterval('P0' . $i . 'D'))->format('d-m-Y');
                    echo $week;    
                }
                dd($week);
            }    
            return $week; 
        } else {
            foreach($weeks as $week){
                for($i = 0 ; $i < 7; $i++){
                    $week = $this->day($day, $month, $year)->modify('last monday')->add(new DateInterval('P0' . $i . 'D'))->format('d-m-Y');
                    echo '<th>' . $week . '</th>';
                }          
            }
            return $week;            
        }      
        
    }

    /**
     * Get the value of day
     */ 
    public function getDay()
    {
        return $this->day;
    }
}