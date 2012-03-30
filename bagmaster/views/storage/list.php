<ul>

<?php foreach($storages as $storage): ?>

	<li width="50px"><?php echo $storage->slot; ?>
	<ul>
	<?php foreach($storage->bags as $bag): ?>
		
		<li title="<?php echo $bag->make?> (<?php echo $bag->color?>)">
			<a href="#" data-placement="right" rel="twipsy" title="test" ><?php echo $bag->member->last ?></a>	
		</li>

	<?php endforeach; ?>
	</ul>
	</li>

<?php endforeach; ?>

</ul>