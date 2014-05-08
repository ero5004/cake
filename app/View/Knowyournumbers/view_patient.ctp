
<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>

<div class="knowyournumbers view">
<h2><?php echo __('Knowyournumber'); ?></h2>
	<!--<dl>
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
	</dl>-->
	<div id='chartBmi_div'>
		<?php
			$chartBmi->div('chartBmi_div');
			$this->GoogleCharts->createJsChart($chartBmi); 
		?>
	</div>
	<div id='chartBp_div'>
		<?php
			$chartBp->div('chartBp_div');
			$this->GoogleCharts->createJsChart($chartBp); 
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Knowyournumbers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Knowyournumber'), array('action' => 'add')); ?> </li>
	</ul>
</div>
