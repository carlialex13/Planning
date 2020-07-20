<?php

use App\Data\Connection;
use App\Date\Calendrier;
use App\Paginated;

$pdo = Connection::getPDO();

try{
    $calendar = new Calendrier($_GET['week'] ?? NULL, $_GET['month'] ?? NULL);
  } catch (\Exception $e) {
    $calendar = new Calendrier();
  };

  $pagination = new Paginated();
  $nextWeek = $router->url('planning', ['week' => $pagination->nextLink()]);
  $previousWeek = $router->url('planning', ['week' => $pagination->previousLink()]);

 

?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1> Mois : <?= $calendar->Day()->format('F'); ?> </h1>
   <h1> Semaine : <?= $calendar->Day()->format('W'); ?> </h1>
</div>

<?php require '../views/calendrier/planning.php'; ?>

<div class="d-flex justify-content-between my-4">
    <a href="<?= $previousWeek ?>" class="btn btn-primary">&laquo; Semaine Précédente</a>
    <a href="<?= $nextWeek ?>" class="btn btn-primary">&laquo; Semaine Suivante</a>
    
</div>