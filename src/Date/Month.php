<?php

namespace App\Date;

use DateInterval;
use DateTime;
use Exception;

class Month
{
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    

    public $year;
    public $month;
    public $week;

    public function __construct(?int $week=NULL, ?int $month=NULL, ?int $year=NULL)
    {

        if($week === NULL || $week < 1 || $week > 52){
            $week = intval(date('W'));
        }

        if($month === NULL || $month < 1 || $month > 12){
            $month = intval(date('m'));
        }

        if($year === NULL){
            $year = intval(date('Y'));
        }

        if($year < 1970){
            throw new Exception ("L'année $year est inférieur à 1970");
        }

        return $this->week = $week;

        return $this->month = $month;   

        return $this->year = $year;
    }
    
    /**
     * getDay : Renvoi le jour actuel
     *
     * @return DateTime
     */
    public function getDay(): DateTime
    {
        return new DateTime();
    }
    
    /**
     * getFirstDay : Renvoi le premier jour du mois
     *
     * @return DateTime
     */
    public function getFirstDayOfMonth(): \DateTime
    {
        return new DateTime("{$this->year}-{$this->month}-01");
    }

    
    /**
     * getFirstDayOfWeek : Retourne le premier de la semaine du jour actuel
     *
     * @return DateTime
     */
    public function getFirstDayOfWeek(): DateTime
    {
        return $this->getDay()->modify('last monday');
    }
    
    /**
     * getLastDayOfWeek : Retourne le dernier jour de la semaine du jour actuel
     *
     * @return DateTime
     */
    public function getLastDayOfWeek(): DateTime
    {
        return $this->getDay()->modify('last monday')->modify('+ 6 days');
    }
    
    /**
     * getIntervall : Interval entre le premier et le dernier jour de la semaine
     *
     * @return DateInterval
     */
    public function getIntervall(): DateInterval
    {
        $firstDay = $this->getDay()->modify('last monday');
        $lastDay = (clone $firstDay)->modify('+ 6 days');
        $intervall = date_diff($lastDay, $firstDay);
        return $intervall;
    }
    
    /**
     * getWeeks
     *
     * @return int
     */
    public function getWeeks(): int
    {
        $start = $this->getFirstDayOfMonth();
        $end = (clone $start)->modify('+1 month - 1 day');
        $weeks = intval($end->format('W'))-intval($start->format('W')) + 1;

        if($weeks < 1){
            $weeks = intval($end->format('W'));
        }

        return $weeks;
    }

    public function nextWeek ()
    {
        $week = $this->getDay()->modify('+1 week')->format('W');
        $month = $this->month;
        if($week > 52){
            $week = 1;
            $month += 1;
        }
        return new Month($week, $month);
    }

    public function previousWeek ()
    {
        $week = $this->getDay()->modify('-1 week')->format('W');
        $month = $this->month;
        if($week < 1){
            $week = 1;
            $month -= 1;
        }
        return new Month($week, $month);
    }

}