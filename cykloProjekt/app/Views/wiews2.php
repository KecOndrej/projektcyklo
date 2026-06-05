<?php
/**
 * @var array $jezdci
 * @var \CodeIgniter\Pager\Pager $pager
 */
?>

<link rel="stylesheet" href="<?= base_url('node_modules/flag-icons/css/flag-icons.min.css') ?>">

<div style="font-family: Arial, sans-serif; padding: 20px;">

    <div style="margin-bottom: 15px;">
        <a href="<?= base_url('index.php/controller1/vsechny') ?>" style="display: inline-block; background-color: #6c757d; color: white; text-decoration: none; padding: 10px 18px; border-radius: 4px; font-weight: bold; font-size: 14px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            ⚙ Správa a úprava závodníků
        </a>
    </div>

    <h1 style="color: #333; margin-bottom: 20px;">Jezdci narození v městě <?= !empty($jezdci[0]['mesto_narodeni']) ? $jezdci[0]['mesto_narodeni'] : 'Vybrané místo' ?></h1>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 14px; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden;">
        <thead>
            <tr style="background-color: #0056b3; color: white; text-align: left;">
                <th style="padding: 12px 15px;">Vlajka</th>
                <th style="padding: 12px 15px;">Jméno a příjmení</th>
                <th style="padding: 12px 15px;">Datum narození</th>
                <th style="padding: 12px 15px;">Výška</th>
                <th style="padding: 12px 15px;">Váha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jezdci as $rider): ?>
                <tr style="border-bottom: 1px solid #e0e0e0;">
                    <td style="padding: 12px 15px;">
                        <?php if (!empty($rider['country'])): ?>
                            <span class="fi fi-<?= strtolower($rider['country']) ?>" style="border-radius: 2px;"></span>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td style="padding: 12px 15px; font-weight: bold; color: #333;">
                        <?= $rider['first_name'] ?> <?= $rider['last_name'] ?>
                    </td>
                    <td style="padding: 12px 15px;">
                        <?= !empty($rider['date_of_birth']) ? date('d. m. Y', strtotime($rider['date_of_birth'])) : '???' ?>
                    </td>
                    <td style="padding: 12px 15px;">
                        <?= !empty($rider['height']) ? $rider['height'] . ' cm' : '???' ?>
                    </td>
                    <td style="padding: 12px 15px;">
                        <?= !empty($rider['weight']) ? $rider['weight'] . ' kg' : '???' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?= $pager->links() ?>
    </div>
</div>