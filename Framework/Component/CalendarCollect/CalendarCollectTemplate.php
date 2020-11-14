<div class="row">
    <div class="col">
        <i class="fas fa-chevron-left" id="previous-week" data-date="<?= $calendarCollect->getPreviousWeek()->format("Y-m-d 00:00:01"); ?>"></i>
    </div>
    <div class="col-10 text-center">
        Semaine du <?= $calendarCollect->weekTiming->begining->format("d/m/Y"); ?>
    </div>
    <div class="col text-right">
        <i class="fas fa-chevron-right" id="next-week" data-date="<?= $calendarCollect->getNextWeek()->format("Y-m-d 00:00:01"); ?>"></i>
    </div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <?php foreach($calendarCollect->collectTiming->listOpening as $day => $timing){ ?>
                <th><?= Config::getConfig("clientConfig")->days->$day->iso . " " . $calendarCollect->getToday($day)->format("d M"); ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php for($h = $calendarCollect->firstHour;$h <= $calendarCollect->getRealLastHour();$h++){ ?>
            <tr>
                <td rowspan="<?= 60/$calendarCollect->collectTiming->slotDuration; ?>" class="align-middle"><?= $calendarCollect->hourToString($h); ?></td>
                <?php foreach($calendarCollect->collectTiming->listOpening as $day => $timing){ ?>  
                    <?php if($calendarCollect->isOpen($day,$h,"00")){ ?>
                        <td class="nopadding">
                            <label class="pickingDate text-center">
                                <input type="radio" name="order.pickingDate" value="<?= $calendarCollect->getToday($day)->format("Y-m-d ") . $h . ":00:00" ?>" />
                                <?= $h . ":00" ?>
                            </label>
                        </td>
                        <?php }else{ ?>
                        <td class="nopadding closed">
                            <label class="pickingDate closed text-center">
                                &nbsp;
                            </label>
                        </td>
                    <?php } ?>
                <?php } ?>
            </tr>
                <?php for($m=$calendarCollect->collectTiming->slotDuration;$m<60;$m+=$calendarCollect->collectTiming->slotDuration){?>
                    <tr>
                        <?php foreach($calendarCollect->collectTiming->listOpening as $day => $timing){ ?>
                            <?php if($calendarCollect->isOpen($day,$h,$m)){ ?>
                                <td class="nopadding">
                                    <label class="pickingDate text-center">
                                        <input type="radio" name="order.pickingDate" value="<?= $calendarCollect->getToday($day)->format("Y-m-d ") . $h . ":" . $m . ":00"; ?>" />
                                        <?= $h . ":" . $m ?>
                                    </label>
                                </td>
                            <?php }else{ ?>
                                <td class="nopadding">
                                    <label class="pickingDate closed text-center">
                                        &nbsp;
                                    </label>
                                </td>
                            <?php } ?>
                        <?php } ?>
                    </tr>
                <?php } ?>

        <?php } ?>
    </tobdy>
</table>