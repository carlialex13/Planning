<?php

namespace App;

use DateTime;

class Parse
{
    public $parsedDay;
    public $parsedMonth;
    public $parsedYear;
    
    
    public function parseToString($url)
    {   
        if($url === "/"){
            $parsedDay = new DateTime();
            $parsedDay = $parsedDay->format('d');
            

            $parsedMonth = new DateTime();
            $parsedMonth = $parsedMonth->format('m');
            

            $parsedYear = new DateTime();
            $parsedYear = $parsedYear->format('Y');

            return [$parsedDay, $parsedMonth, $parsedYear];

        } else {
            
            $parse = explode('/', $url);
        
            $parsed = explode('&', $parse[3]);
            $parsedDay = explode('=', $parsed[0]);
            $parsedMonth = explode('=', $parsed[1]);
            $parsedYear = explode('=', $parsed[2]);

            return [$parsedDay[1], $parsedMonth[1], $parsedYear[1]];
        }    
        
    }
}