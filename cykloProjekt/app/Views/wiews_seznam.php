<?php
/**
 * @var array $jezdci
 * @var \CodeIgniter\Pager\Pager $pager
 */
?>


<div style="font-family: Arial, sans-serif; padding: 20px;">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color: #333; margin: 0; font-size: 24px;">Správa a úprava závodníků</h1>
        <div>
            <a href="<?= base_url('/') ?>" style="background-color: #6c757d; color: white; text-decoration: none; padding: 10px 15px; border-radius: 4px; font-weight: bold; font-size: 14px;">Zpět na hlavní přehled</a>
        </div>
    </div>

    <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden; font-size: 14px;">
        <thead>
            <tr style="background-color: #212529; color: white; text-align: left;">
                <th style="padding: 12px 15px;">ID</th>
                <th style="padding: 12px 15px;">Foto</th>
                <th style="padding: 12px 15px;">Země</th>
                <th style="padding: 12px 15px;">Jméno a Příjmení</th>
                <th style="padding: 12px 15px;">Datum narození</th>
                <th style="padding: 12px 15px;">Místo narození</th>
                <th style="padding: 12px 15px;">Výška</th>
                <th style="padding: 12px 15px;">Váha</th>
                <th style="padding: 12px 15px; text-align: center;">Akce</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($jezdci as $rider): ?>
                <tr style="border-bottom: 1px solid #e0e0e0;">
                    <td style="padding: 12px 15px; color: #666;"><?= $rider['id'] ?></td>
                    
                    <td style="padding: 12px 15px;">
                        <?php if (!empty($rider['photo'])): ?>
                            <img src="<?= base_url($rider['photo']) ?>" alt="Foto" style="width: 35px; height: 35px; object-fit: cover; border-radius: 4px; border: 1px solid #ccc;">
                        <?php else: ?>
                            <span style="color: #ccc; font-size: 12px;">Bez foto</span>
                        <?php endif; ?>
                    </td>
                    
                    <td style="padding: 12px 15px; text-transform: uppercase; font-weight: bold;"><?= $rider['country'] ?></td>
                    
                    <td style="padding: 12px 15px; font-weight: bold; color: #333;"><?= $rider['first_name'] ?> <?= $rider['last_name'] ?></td>
                    
                    <td style="padding: 12px 15px;">
                        <?= !empty($rider['date_of_birth']) ? date('d. m. Y', strtotime($rider['date_of_birth'])) : '---' ?>
                    </td>
                    
                    <td style="padding: 12px 15px;"><?= $rider['mesto_narodeni'] ?: '---' ?></td>
                    
                    <td style="padding: 12px 15px;"><?= !empty($rider['height']) ? $rider['height'] . ' cm' : '---' ?></td>
                    
                    <td style="padding: 12px 15px;"><?= !empty($rider['weight']) ? $rider['weight'] . ' kg' : '---' ?></td>
                    
                    <td style="padding: 12px 15px; text-align: center; display: flex; gap: 8px; justify-content: center; align-items: center; min-height: 40px;">
                        <a href="<?= base_url('index.php/controller1/editovat/' . $rider['id']) ?>" style="background-color: #ffc107; color: #212529; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-weight: bold; font-size: 13px; display: inline-block;">
                            Upravit
                        </a>
                        
                        <a href="<?= base_url('index.php/controller1/smazat/' . $rider['id']) ?>" onclick="return confirm('Opravdu chcete tohoto závodníka smazat?');" style="background-color: #dc3545; color: white; text-decoration: none; padding: 6px 12px; border-radius: 4px; font-weight: bold; font-size: 13px; display: inline-block;">
                            Smazat
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?= $pager->links() ?>
    </div>
</div>