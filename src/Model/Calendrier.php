<?php

namespace App\Model;

class Month
{
    public $year;
    public $month;
    public $week;
    public $day;

    /**
     * Get the value of year
     */ 
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of month
     */ 
    public function getMonth(): ?string
    {
        return $this->month;
    }

    /**
     * Set the value of month
     *
     * @return  self
     */ 
    public function setMonth($month): self
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get the value of week
     */ 
    public function getWeek(): ?int
    {
        return $this->week;
    }

    /**
     * Set the value of week
     *
     * @return  self
     */ 
    public function setWeek($week): self
    {
        $this->week = $week;

        return $this;
    }

    /**
     * Get the value of day
     */ 
    public function getDay(): ?int
    {
        return $this->day;
    }

    /**
     * Set the value of day
     *
     * @return  self
     */ 
    public function setDay($day): self
    {
        $this->day = $day;

        return $this;
    }
}