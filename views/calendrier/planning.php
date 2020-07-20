<?php

use App\Data\Connection;
use App\HTML\Form;
use App\Table\UsersTable;

$user = (new UsersTable(Connection::getPDO()))->all();

$errors = [];

$form = new Form($user, $errors);

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

        
        

        <tr> </td></tr>

