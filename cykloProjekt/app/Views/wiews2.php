<?php
/**
 * @var array $jezdci
 * @var \CodeIgniter\Pager\Pager $pager
 */
?>

<link rel="stylesheet" href="<?= base_url('node_modules/flag-icons/css/flag-icons.min.css') ?>">
<link rel="stylesheet" href="/kec/projektcyklo/cykloProjekt/obrazky/styl.css">

<div style="font-family: Arial, sans-serif; padding: 20px;">
    
    
    <h1 style="color: #333; margin-bottom: 20px;">Jezdci narození v městě <?= !empty($jezdci[0]['mesto_narodeni']) ? $jezdci[0]['mesto_narodeni'] : 'Vybrané místo' ?></h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr>
                <th>Vlajka</th>
                <th>Jméno a příjmení</th>
                <th>Datum narození</th>
                <th>Výška</th>
                <th>Váha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jezdci as $rider): ?>
                <tr>
                    <td>
                        <?php if (!empty($rider['country'])): ?>
                            <span class="fi fi-<?= strtolower($rider['country']) ?>"></span>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td class="jmeno-tabulka">
                        <?= $rider['first_name'] ?> <?= $rider['last_name'] ?>
                    </td>
                    <td>
                        <?= !empty($rider['date_of_birth']) ? date('d. m. Y', strtotime($rider['date_of_birth'])) : '???' ?>
                    </td>
                    <td>
                        <?= !empty($rider['height']) ? $rider['height'] . ' cm' : '???' ?>
                    </td>
                    <td>
                        <?= !empty($rider['weight']) ? $rider['weight'] . ' kg' : '???' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="strankovani-wrap">
        <?= $pager->links('default', 'moje_strankovani') ?>
    </div>
</div>