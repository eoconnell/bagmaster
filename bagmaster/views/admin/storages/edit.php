<h2>Editing Storage</h2>
<br>

<?php echo render('admin/storages/_form'); ?>
<p>
	<?php echo Html::anchor('admin/storages/view/'.$storage->id, 'View'); ?> |
	<?php echo Html::anchor('admin/storages', 'Back'); ?></p>
