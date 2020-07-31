<?php
/*
use App\HTML\Form;
use App\Paginated;
use App\Data\Connection;
use App\Date\Calendrier;
use App\Table\UsersTable;

$user = (new UsersTable(Connection::getPDO()))->all();

$errors = [];

$form = new Form($user, $errors);

if(!isset($calendar)){
    try{
        $calendar = new Calendrier($_GET['week'] ?? NULL, $_GET['month'] ?? NULL);
      } catch (\Exception $e) {
        $calendar = new Calendrier();
      };
}

$pagination = new Paginated();
$nextWeek = $router->url('planning', ['week' => $pagination->nextLink()]);
$previousWeek = $router->url('planning', ['week' => $pagination->previousLink()]);

?>
        <table class="table ">
            <thead>
                <tr>
                    <td><?= $calendar->DayOfWeek(); ?></td>
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
            <a href="<?= $previousWeek ?>" class="btn btn-primary">&laquo; Semaine Précédente</a>
            <a href="<?= $nextWeek ?>" class="btn btn-primary">Semaine Suivante&laquo;</a>
        </div>

