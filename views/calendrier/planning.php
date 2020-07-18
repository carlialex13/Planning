<?php
for($i = 0; $i <=52; $i++):
    $test1 = $test->FirstDayYear()->add(new DateInterval("P".$i."W"))->format('W') ?>
    <div class="calendar__day">Semaine N° <?= $test1 ; ?></div>
        <?php foreach($test1 as $day): ?>
        
        <?php endforeach; ?>
<?php endfor; ?>


