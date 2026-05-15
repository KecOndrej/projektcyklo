<?php
    /**
     * @var string $pozdrav
     * @var array $seznam
     * @var array $jezdci
     */
?>

<ul>

<ul>
    <h1>Seznam jezdců z databáze</h1>
    <?php foreach($jezdci as $rider): ?>
        <li><?= $rider['first_name'] ?>
       
        <?= $rider['last_name'] ?></li>

        <?= $rider['country'] ?>

    <?php endforeach; ?>
</ul>
</ul>