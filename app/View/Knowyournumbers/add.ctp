<div class="knowyournumbers form">
<?php echo $this->Form->create('Knowyournumber'); ?>
	<fieldset>
		<legend><?php echo __('Add Knowyournumber'); ?></legend>
	<?php
		echo $this->Form->input('customerId');
		echo $this->Form->input('chwId');
		echo $this->Form->input('time');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('height');
		echo $this->Form->input('weight');
		echo $this->Form->input('systolic');
		echo $this->Form->input('diastolic');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Knowyournumbers'), array('action' => 'index')); ?></li>
	</ul>
</div>
