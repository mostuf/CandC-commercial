<label class="switch">
    <input class="realValue" type="hidden" name="<?= $switch->elementName; ?>" value="<?= ($switch->checked == 0)?"false":"true"; ?>" />
    <input type="checkbox" <?= ($switch->checked)?"checked":""; ?>>
    <span class="slider round" <?php if($switch->tooltip){ echo 'data-switch-tooltip="tooltip" title="' . $switch->text . '"'; }?>></span>
    <?php if(!$switch->tooltip){ ?>
    <?= $this->text; ?>
    <?php } ?>
</label>