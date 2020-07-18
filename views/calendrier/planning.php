<?php

use App\Data\Connection;
use App\Table\UsersTable;

$user = (new UsersTable(Connection::getPDO()))->all();

?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <?= $test->DayOfWeek(); ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($user as $username ): ?>
                    <tr>
                        <td>
                            <?= $username->getUsername(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        



