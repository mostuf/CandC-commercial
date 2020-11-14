<?php $pair = false; ?>
<?php foreach($clientConfig->homeComponent as $component){ ?>
    <div class="block block-<?= $pair?"dark":"light"; ?>">
        <?php Component::{$component->name}(...$component->parameter); ?>
    </div>
    <?php $pair = !$pair; ?>
<?php } ?>

