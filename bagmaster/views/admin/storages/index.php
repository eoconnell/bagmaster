<h2>Listing Storages</h2>
<br>
<?php if ($storages): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Slot</th>
<?php $max_capacity = Model_Storage::max_capacity(); ?>
<?php for($x=0; $x<$max_capacity; $x++): ?>
			<th></th>
<?php endfor; ?>
			<th>Capacity</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($storages as $storage): ?>		<tr>

			<td><?php echo $storage->slot; ?></td>
<?php for ($x=1; $x<=$max_capacity; $x++): ?>
	<?php if ($x > count($storage->bags)): ?>
			<td></td>
	<?php else: ?>
			<td><?php echo $storage->bags[$x]->member->last; ?></td>
	<?php endif; ?>
<?php endfor; ?>
			<td><?php echo $storage->capacity; ?></td>
			<td>
				<?php echo Html::anchor('admin/storages/view/'.$storage->id, 'View'); ?> |
				<?php echo Html::anchor('admin/storages/edit/'.$storage->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/storages/delete/'.$storage->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Storages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/storages/create', 'Add new Storage', array('class' => 'btn success')); ?>

</p>
