<h2>Editing Member</h2>
<br>

<?php echo render('admin/members/_form'); ?>
<p>
	<?php echo Html::anchor('admin/members/view/'.$member->id, 'View'); ?> |
	<?php echo Html::anchor('admin/members', 'Back'); ?></p>
