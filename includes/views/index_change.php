<form action="<?= Route::url('index','edit')?>" method="post">
    <?php var_dump(isset($_REQUEST['id'])); ?>
    <input type="hidden" name="id" value="<?= $_REQUEST['id']?>">
    <label>Note
        <input type="text" name="note" value="<?= $_REQUEST['text']?>">
    </label>
    <input type="submit" value="edit">
</form>