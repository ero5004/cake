<div class="knowyournumbers view">
<h2><?php echo __('Knowyournumber'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CustomerId'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['customerId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ChwId'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['chwId']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Systolic'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['systolic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diastolic'); ?></dt>
		<dd>
			<?php echo h($knowyournumber['Knowyournumber']['diastolic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('BMI'); ?></dt>
		<dd>
			<?php 
				// Get the weight & height from the internal database
				$mass = $knowyournumber['Knowyournumber']['weight'];
				//echo h($mass);
				$height = $knowyournumber['Knowyournumber']['height'];
				//echo h($height);
				// Call the helper co-function to compute the BMI
				$bmi = $this->CoFunctions->computeBMI($mass, $height);
				echo h($bmi); //print computated BMI value
			?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Knowyournumber'), array('action' => 'edit', $knowyournumber['Knowyournumber']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Knowyournumber'), array('action' => 'delete', $knowyournumber['Knowyournumber']['id']), null, __('Are you sure you want to delete # %s?', $knowyournumber['Knowyournumber']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Knowyournumbers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Knowyournumber'), array('action' => 'add')); ?> </li>
	</ul>
</div>
