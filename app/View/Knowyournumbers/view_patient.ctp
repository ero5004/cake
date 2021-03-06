
<?php echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<div style="width: 1000px">
<div class="knowyournumbers view" style="float:left" width="500px">
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
<div id='present_stats'; style="float: right; width: 500px">
	<?php 
		$records = $patientRecords;
		$this->CoFunctions->sort_objs_by_date($records);//sort patient records object array
		//echo '~>> ' . end($records)['Knowyournumber']['time'] . "\n";
		$record = end($records);
	?>
	<table>
	<tr>
		<td><?php echo '<b>'.h('Record for Patient '. $record['Knowyournumber']['customerId']).'</b>'; ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo h('Final time = ' . $record['Knowyournumber']['time']); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php $weight = $record['Knowyournumber']['weight'];
				  echo h('Weight = ' . $weight. ' kg'); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php $height = $record['Knowyournumber']['height'];
				  echo h('Height = ' . $height. ' cm'); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php $bmi = $this->CoFunctions->computeBMI($weight, $height);
				  echo h('BMI = ' . $bmi); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo h('Systolic = ' . $record['Knowyournumber']['systolic']); ?>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo h('Diastolic = ' . $record['Knowyournumber']['diastolic']); ?>&nbsp;</td>
	</tr>
	</table>
</div>
<div class="actions" style="float: right; width: 500px;">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('All Consultations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Consultations'), array('action' => 'add')); ?> </li>
	</ul>
</div>
</div>

