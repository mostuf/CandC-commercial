<div class="block block-dark customMessage">
    <div class="row">
        <div class="col-12 text-center">
            <h1>Oups ! Maintenance</h1>
        </div>
        <div class="col-md-3 col-sm-12 arthur">
            <img  src="/Img/Shared/arthur.png">
            
        </div>
        <div class="col-md-6 col-sm-12">
            <span class="message block-arthur">
             Désolé, le site est actuellement en maintenance. Merci de réessayer ultérieurement.
            </span>
            <span class="alert alert-secondary">
                <span class="title">Travail en cours :</span>
                <?= $config->maintenance->reason->title; ?>
                <span class="title">Fin de maintenance prévue :</span>
                <?php
                    $debut = DateTime::createFromFormat('d/m/y H:i',$config->maintenance->reason->startDate);
                    $fin = DateTime::createFromFormat('d/m/y H:i',$config->maintenance->reason->endDate);
                    $diff = $debut->diff($fin);
                    $total = $diff->i + $diff->h*60 + $diff->d*24*60;
                    $passed = $debut->diff(new DateTime("-0200"));
                    $progress = ($passed->i + $passed->h*60 + $passed->d*24*60) / $total * 100;
                ?>
                <script>
                    var diff = <?= $total; ?>;
                    var progress = <?= ($passed->i + $passed->h*60 + $passed->d*24*60); ?>;
                </script>
                <div class="progress progress-maintenance">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $progress; ?>%" aria-valuenow="<?= $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="text-right"><?= $config->maintenance->reason->endDate; ?></div>
            </span>
        </div>
        <div class="col-md-3 col-sm-12 icone">
            <img  src="/Img/Shared/tools.png">
        </div>
    </div>
</div>
