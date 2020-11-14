<select name="<?= $listSelect->selectName; ?>" class="form-control">
    <?php foreach($listSelect->listElement as $element){ ?>
        <option value="<?= $element->key; ?>" <?php if($listSelect->selectedKey == $element->key){ echo "selected";} ?>><?= str_repeat("&nbsp;&nbsp;&nbsp;",$element->level) . $element->name; ?></option>
    <?php } ?> 
</select>