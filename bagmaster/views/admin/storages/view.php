<h2>Viewing #<?php echo $storage->id; ?></h2>

<p>
	<strong>Slot:</strong>
	<?php echo $storage->slot; ?></p>
<p>
	<strong>Capacity:</strong>
	<?php echo $storage->capacity; ?></p>

<?php echo Html::anchor('admin/storages/edit/'.$storage->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/storages', 'Back'); ?>