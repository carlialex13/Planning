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
$formLink = $router->url('formulaire');

$month = $calendar->Day($parse[0], $parse[1], $parse[2])->format('d-m-Y');
$week = $calendar->Day($parse[0], $parse[1], $parse[2])->format('W');
?>

<div class="d-flex flex-row align-items-center justify-content-between m-3">
   <p class="font-weight-bold"> Date: <?= $month; ?> </p>
   <p class="font-weight-bold"> Semaine : <?= $week; ?> </p>
</div>

<table class="table">
            <thead>
                <tr>
                    <td>
                        <?= $calendar->dayOfWeek($parse[0], $parse[1], $parse[2])?>
                    </td>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($user as $username): ?>
                    <tr>
                        <td><?= $username->getUsername(); ?></td>
                            <?php for($i = 0; $i < 7 ; $i++): ?>
                                <td class="<?= $username->getUsername() ?>"> <a href="<?= $formLink; ?>" class="btn btn-primary btn-lg font-weight-lighter" style="width: 6rem;" tabindex="-1" role="button" aria-disabled="true">Non Plannifié</a> </td>
                            <?php endfor; ?>                      
                    </tr>
                <?php endforeach; ?> 
            </tbody>  
</table>

<div class="d-flex justify-content-between my-4">
    <a href="<?= $previousWeek ?>" class="btn btn-primary">&laquo;Page précédente </a>
    <a href="<?= $nextWeek ?>" class="btn btn-primary">Page suivante &raquo;</a>
</div>





