<h2>Editing Bag</h2>
<br>

<?php echo render('admin/bags/_form'); ?>
<p>
	<?php echo Html::anchor('admin/bags/view/'.$bag->id, 'View'); ?> |
	<?php echo Html::anchor('admin/bags', 'Back'); ?></p>
