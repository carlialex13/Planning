<?php

use App\HTML\Form;
use App\Paginated;
use App\Data\Connection;
use App\Date\Calendrier;
use App\Table\UsersTable;

$pdo = Connection::getPDO();


$calendar = new Calendrier();
 

$user = (new UsersTable(Connection::getPDO()))->all();

$errors = [];
  
$form = new Form($user, $errors);  

$pagination = new Paginated();
$getWeek = explode("=",$_SERVER['REQUEST_URI'])[1] ?? (new DateTime())->format('d');
?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1> Mois : <?= $calendar->Day($_GET['week'] ?? NULL, $_GET['month'] ?? NULL)->format('F'); ?> </h1>
   <h1> Semaine : <?= $calendar->Day($_GET['week'] ?? NULL, $_GET['month'] ?? NULL)->format('W'); ?> </h1>
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





