<?php $pager->setSurroundCount(2) ?>


<nav aria-label="Page navigation" style="font-family: Arial, sans-serif; margin: 20px 10px;">
    <ul style="display: flex; list-style: none; padding: 0; gap: 5px;">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" style="padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; color: #0056b3; border-radius: 4px; background: #fff;">&laquo; První</a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" style="padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; color: #0056b3; border-radius: 4px; background: #fff;">&lsaquo; Předchozí</a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li>
                <a href="<?= $link['uri'] ?>" style="padding: 8px 14px; border: 1px solid <?= $link['active'] ? '#0056b3' : '#ddd' ?>; text-decoration: none; color: <?= $link['active'] ? '#fff' : '#0056b3' ?>; background-color: <?= $link['active'] ? '#0056b3' : '#fff' ?>; border-radius: 4px; font-weight: <?= $link['active'] ? 'bold' : 'normal' ?>;">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>
            <li>
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" style="padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; color: #0056b3; border-radius: 4px; background: #fff;">Další &rsaquo;</a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" style="padding: 8px 12px; border: 1px solid #ddd; text-decoration: none; color: #0056b3; border-radius: 4px; background: #fff;">Poslední &raquo;</a>
            </li>
        <?php endif ?>
    </ul>
</nav>      