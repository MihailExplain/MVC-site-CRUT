<h2>All notes</h2>
<table>
    <tr>
        <th>#</th>
        <th>note</th>
        <th colspan="2">action</th>
    </tr>
<!--    --><?php //var_dump($notes);?>
    <?php if(count($notes)>0):?>
    <?php foreach ($notes as $note):?>
        <tr>
            <td><?= $note['id']?></td>
            <td><?= $note['text']?></td>
            <td><form action="<?= Route::url('index', 'delete')?>" method="post">
                    <input type="hidden" name="id" value="<?= $note['id']?>">
                    <input type="submit" value="Delete" >
                </form>
            </td>
            <td><form action="<?= Route::url('index', 'change')?>" method="post">
                <input type="hidden" name="id" value="<?= $note['id']?>">
                <input type="hidden" name="text" value="<?=$note['text']?>">
                <input type="submit" value="Change" >
            </form>
            </td>
        </tr>
    <?php endforeach;?>
    <?php endif;?>
</table>
<form action="<?= Route::url('index','create')?>">
    <input type="submit" value="new note">
</form>