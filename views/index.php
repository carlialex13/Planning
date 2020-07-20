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
  list($week) = $pagination->nextLink();
  $link = $router->url('planning', ['week' => $week]);
 

?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1> Mois : <?= $calendar->Day()->format('F'); ?> </h1>
   <h1> Semaine : <?= $calendar->Day()->format('W'); ?> </h1>
</div>

<?php require '../views/calendrier/planning.php'; ?>

<div class="d-flex justify-content-between my-4">
    <a href="<?= $link ?>" class="btn btn-primary">&laquo; Semaine Suivante</a>
    
</div>