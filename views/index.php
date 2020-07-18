<?php

use App\Data\Connection;
use App\Date\Calendrier;
use App\Date\Month;

$pdo = Connection::getPDO();

try{
    $month = new Calendrier($_GET['week'] ?? NULL, $_GET['month'] ?? NULL);
  } catch (\Exception $e) {
    $month = new Calendrier();
  };

$test = new Calendrier();

// $link = $router->url('home');
// $url = $router->url('home', ['week' => $_GET['week'], 'month' => $_GET['month']]);

?>

<h1>Acceuil</h1>
<div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
   <h1> Mois : <?= $month->Day()->format('F'); ?> </h1>
   <h1> Semaine : <?= $month->Day()->format('W'); ?> </h1>
</div>

<?php require '../views/calendrier/planning.php'; ?>