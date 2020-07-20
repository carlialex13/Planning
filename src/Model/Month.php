<?php

namespace App\Model;

class Month
{
    public $year;
    public $month;
    public $week;

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
}