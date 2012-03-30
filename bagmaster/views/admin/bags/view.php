<h2>Viewing #<?php echo $bag->id; ?></h2>

<p>
	<strong>Make:</strong>
	<?php echo $bag->make; ?></p>
<p>
	<strong>Color:</strong>
	<?php echo $bag->color; ?></p>
<p>
	<strong>Member id:</strong>
	<?php echo $bag->member->last ?></p>
<p>
	<strong>Storage id:</strong>
	<?php echo $bag->storage->slot ?></p>

<?php echo Html::anchor('admin/bags/edit/'.$bag->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/bags', 'Back'); ?>