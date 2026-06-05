<?php
    /**
     * @var array $jezdci
     * @var \CodeIgniter\Pager\Pager $pager
     */
?>
<link rel="stylesheet" href="<?= base_url('node_modules/flag-icons/css/flag-icons.min.css') ?>">
<link rel="stylesheet" href="/kec/projektcyklo/cykloProjekt/obrazky/styl.css">

<h1>Seznam jezdců z Francie</h1>

<ul class="karty-grid">
    <?php foreach($jezdci as $rider): ?>
        <li class="karta-jezdce">
            
            <div class="foto-box">
                <?php if (!empty($rider['photo'])): ?>
                    <img src="/kec/projektcyklo/cykloProjekt/obrazky/riders/<?= $rider['photo'] ?>" alt="<?= $rider['last_name'] ?>">
                <?php else: ?>
                    <div class="foto-chybi">No foto</div>
                <?php endif; ?>
            </div>

            <div class="info-box">
                <h3 class="jmeno-titulek">
                    <?= $rider['first_name'] ?> <?= $rider['last_name'] ?>
                    <?php if (!empty($rider['country'])): ?>
                        <span class="fi fi-<?= strtolower($rider['country']) ?>"></span>
                    <?php endif; ?>
                </h3>
                <p class="text-info">
                    <strong>Datum nar.:</strong> <?= !empty($rider['date_of_birth']) ? date('d. m. Y', strtotime($rider['date_of_birth'])) : '???' ?><br>
                    <strong>Místo nar.:</strong> 
                    <?php if (!empty($rider['mesto_narodeni'])): ?>
                        <a href="<?= base_url('controller1/misto/' . $rider['place_of_birth']) ?>" class="odkaz-mesto">
                            <?= $rider['mesto_narodeni'] ?>
                        </a>
                    <?php else: ?>
                        ???
                    <?php endif; ?><br>
                    <strong>Výška:</strong> <?= !empty($rider['height']) ? $rider['height'] . ' cm' : '???' ?><br>
                    <strong>Váha:</strong> <?= !empty($rider['weight']) ? $rider['weight'] . ' kg' : '???' ?>
                </p>
            </div>

        </li>  
    <?php endforeach; ?>
</ul>

<div class="strankovani-wrap">
    <?= $pager->links('default', 'moje_strankovani') ?>
</div>