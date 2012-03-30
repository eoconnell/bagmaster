<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Make', 'make'); ?>

			<div class="input">
				<?php echo Form::input('make', Input::post('make', isset($bag) ? $bag->make : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Color', 'color'); ?>

			<div class="input">
				<?php echo Form::input('color', Input::post('color', isset($bag) ? $bag->color : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Member', 'member_id'); ?>

			<div class="input">
				<?php echo Form::select('member_id', Input::post('member_id', isset($post) ? $post->member_id : ''), $members, array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Storage Slot', 'storage_id'); ?>

			<div class="input">
				<?php echo Form::select('storage_id', Input::post('storage_id', isset($post) ? $post->storage_id : ''), $storage, array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>