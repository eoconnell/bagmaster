<h2>Listing Members</h2>
<br>
<?php if ($members): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>First</th>
			<th>Last</th>
			<th>Sex</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($members as $member): ?>		<tr>

			<td><?php echo $member->first; ?></td>
			<td><?php echo $member->last; ?></td>
			<td><?php echo $member->sex; ?></td>
			<td>
				<?php echo Html::anchor('admin/members/view/'.$member->id, 'View'); ?> |
				<?php echo Html::anchor('admin/members/edit/'.$member->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/members/delete/'.$member->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Members.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/members/create', 'Add new Member', array('class' => 'btn success')); ?>

</p>
