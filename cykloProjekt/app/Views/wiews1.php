<?php
    /**
     * @var string $pozdrav
     * @var array $seznam
     * @var array $jezdci
     * @var array $pager
     */
?>

<h1 style="font-family: Arial, sans-serif; color: #333; margin-left: 10px;">Seznam jezdců z databáze</h1>

<ul style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; padding: 10px; list-style-type: none; font-family: Arial, sans-serif;">
    <?php foreach($jezdci as $rider): ?>
        <li style="border: 1px solid #e0e0e0; padding: 12px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); background-color: #fff; font-size: 14px;">
            <h3 style="margin-top: 0; margin-bottom: 8px; color: #0056b3; font-size: 16px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                <?= $rider['first_name'] ?> <?= $rider['last_name'] ?>
            </h3>
            <p style="margin: 0; line-height: 1.4; color: #555;">
                <strong>Datum nar.:</strong> <?= !empty($rider['date_of_birth']) ? date('d. m. Y', strtotime($rider['date_of_birth'])) : '???' ?><br>
                <strong>Místo nar.:</strong> <?= !empty($rider['mesto_narodeni']) ? $rider['mesto_narodeni'] : '???' ?><br>
                <strong>Výška:</strong> <?= !empty($rider['height']) ? $rider['height'] . ' cm' : '???' ?><br>
                <strong>Váha:</strong> <?= !empty($rider['weight']) ? $rider['weight'] . ' kg' : '???' ?>
            </p>
        </li>  
    <?php endforeach; ?>
</ul>

<div style="margin: 20px 10px; font-family: Arial, sans-serif;">
    <?= $pager->links() ?>
</div>