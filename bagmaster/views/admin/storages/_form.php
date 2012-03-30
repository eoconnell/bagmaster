<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Slot', 'slot'); ?>

			<div class="input">
				<?php echo Form::input('slot', Input::post('slot', isset($storage) ? $storage->slot : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Capacity', 'capacity'); ?>

			<div class="input">
				<?php echo Form::input('capacity', Input::post('capacity', isset($storage) ? $storage->capacity : '0'), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>