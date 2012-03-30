<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('First', 'first'); ?>

			<div class="input">
				<?php echo Form::input('first', Input::post('first', isset($member) ? $member->first : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Last', 'last'); ?>

			<div class="input">
				<?php echo Form::input('last', Input::post('last', isset($member) ? $member->last : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Sex', 'sex'); ?>

			<div class="input">
				<?php echo Form::input('sex', Input::post('sex', isset($member) ? $member->sex : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>