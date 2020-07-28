<?php

use App\HTML\Form;
use App\Paginated;
use App\Data\Connection;
use App\Date\Calendrier;
use App\Parse;
use App\Table\UsersTable;

$pdo = Connection::getPDO();

$calendar = new Calendrier();
 
$user = (new UsersTable(Connection::getPDO()))->all();

$errors = [];
  
$form = new Form($user, $errors);  

$parse = new Parse();
$parse = $parse->parseToString($_SERVER['REQUEST_URI']);

$link = new Paginated();
$nextLink = $link->nextWeek($parse[0], $parse[1], $parse[2]);
$previousLink = $link->previousWeek($parse[0], $parse[1], $parse[2]);

$nextWeek = $router->url('planning', ['day' => $nextLink->format('d'), 'month' => $nextLink->format('m'), 'year' => $nextLink->format('Y')]);
$previousWeek = $router->url('planning', ['day' => $previousLink->format('d'), 'month' => $previousLink->format('m'), 'year' => $previousLink->format('Y')]);

$month = $calendar->Day($parse[0], $parse[1], $parse[2])->format('F');
$week = $calendar->Day($parse[0], $parse[1], $parse[2])->format('W');


?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1> Mois : <?= $month; ?> </h1>
   <h1> Semaine : <?= $week; ?> </h1>
</div>

<table class="table ">
            <thead>
                <tr>
                    <td><?= $calendar->formatDay(); ?></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user as $username ): ?>
                    <tr>
                        <td><?= $username->getUsername(); ?></td>
                        <?php for($i = 0; $i < 7 ; $i++): ?>
                            <td> <button class="btn btn-primary"></button>
                        <?php endfor; ?>                      
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

<div class="d-flex justify-content-between my-4">
    <a href="<?= $previousWeek ?>" class="btn btn-primary ml-auto">&laquo;Page précédente </a>
    <a href="<?= $nextWeek ?>" class="btn btn-primary ml-auto">Page suivante &raquo;</a>
</div>





