<h2>Viewing #<?php echo $member->id; ?></h2>

<p>
	<strong>First:</strong>
	<?php echo $member->first; ?></p>
<p>
	<strong>Last:</strong>
	<?php echo $member->last; ?></p>
<p>
	<strong>Sex:</strong>
	<?php echo $member->sex; ?></p>

<?php echo Html::anchor('admin/members/edit/'.$member->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/members', 'Back'); ?>