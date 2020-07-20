<?php

namespace App;

use DateInterval;
use DateTime;

class Paginated
{
    public function previousLink(string $link): ?string
    {
        return <<<HTML
            <a href="{$link}" class="btn btn-primary">&laquo; Page Précédente</a>
HTML;
    }

    public function nextLink()
    {
        $week = new DateTime();
        $week = $week->add(new DateInterval('P01W'))->format('W');
        
        return [$week];
    }

}