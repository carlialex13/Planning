<?php

namespace App;

use App\Date\Month;

class Paginated
{
    public function nextWeek ()
    {
        $week = $this->Weeks()->modify('+1 week')->format('W');
        $month = $this->month;
        if($week > 52){
            $week = 1;
            $month += 1;
        }
        return new Month($week, $month);
    }

    public function previousWeek ($link)
    {
        if(isset($_GET['week']) && isset($_GET['month'])){
            $week = (int)$params['week'];
            $month = $params['month'];
            $url = $router->url('planning', ['week' => $_GET['week'], 'month' => $_GET['month']]); 
            dd($url);
          };
          
        return <<<HTML
            <a href="/views/calendrier/planning.php?week=<?= $month->previousWeek()->week ?>&month=<?= $month->previousWeek()->month" class="btn btn-primary">&laquo; Page Précédente</a>
HTML;
    }

}