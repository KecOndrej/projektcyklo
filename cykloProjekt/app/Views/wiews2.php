<?php
    /**
     * @var array $jezdci
     * @var \CodeIgniter\Pager\Pager $pager
     */
?>
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="vypis-mesto">
    
    <h1>Jezdci narození v městě <?= !empty($jezdci[0]['mesto_narodeni']) ? $jezdci[0]['mesto_narodeni'] : 'Vybrané místo' ?></h1>

    <table class="tabulka-jezdcu">
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

<?= $this->endSection() ?>