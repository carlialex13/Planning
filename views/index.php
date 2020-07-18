<?php

use App\Data\Connection;
use App\Date\Calendrier;
use App\Date\Month;

$pdo = Connection::getPDO();

try{
    $month = new Month($_GET['week'] ?? NULL, $_GET['month'] ?? NULL);
  } catch (\Exception $e) {
    $month = new Month();
  };

$test = new Calendrier();

$firstDayWeek = $month->getFirstDayOfWeek();
$lastDayOfWeek = $month->getLastDayOfWeek();
$interval = $month->getIntervall();

?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1><?= $month->getDay()->format('F');?></h1>
  <div>
        <a href="/Calendar/public/index.php?week=<?= $month->previousWeek()->week ?>&month=<?= $month->previousWeek()->month ?>" class="btn btn-primary">&lt</a>
        <a href="/Calendar/public/index.php?week=<?= $month->nextWeek()->week ?>&month=<?= $month->nextWeek()->month ?>" class="btn btn-primary">&gt</a>
  </div>
</div>

<?php require '../views/calendrier/planning.php'; ?>