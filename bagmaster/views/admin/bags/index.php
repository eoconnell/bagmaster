<h2>Listing Bags</h2>
<br>
<?php if ($bags): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Make</th>
			<th>Color</th>
			<th>Member</th>
			<th>Storage Slot</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($bags as $bag): ?>		<tr>

			<td><?php echo $bag->make; ?></td>
			<td><?php echo $bag->color; ?></td>
			<td><?php echo $bag->member->last; ?></td>
			<td><?php echo $bag->storage->slot; ?></td>
			<td>
				<?php echo Html::anchor('admin/bags/view/'.$bag->id, 'View'); ?> |
				<?php echo Html::anchor('admin/bags/edit/'.$bag->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/bags/delete/'.$bag->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Bags.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/bags/create', 'Add new Bag', array('class' => 'btn success')); ?>

</p>
