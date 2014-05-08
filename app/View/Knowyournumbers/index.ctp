<div class="knowyournumbers index">
	<h2><?php echo __('Knowyournumbers'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('customerId'); ?></th>
			<th><?php echo $this->Paginator->sort('chwId'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('systolic'); ?></th>
			<th><?php echo $this->Paginator->sort('diastolic'); ?></th>
			<th><?php echo __('bmi'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($knowyournumbers as $knowyournumber): ?>
	<tr>
		<td><?php echo h($knowyournumber['Knowyournumber']['customerId']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['chwId']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['time']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['height']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['weight']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['systolic']); ?>&nbsp;</td>
		<td><?php echo h($knowyournumber['Knowyournumber']['diastolic']); ?>&nbsp;</td>
		<td>
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
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'viewPatient', $knowyournumber['Knowyournumber']['customerId'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $knowyournumber['Knowyournumber']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $knowyournumber['Knowyournumber']['id']), null, __('Are you sure you want to delete # %s?', $knowyournumber['Knowyournumber']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Knowyournumber'), array('action' => 'add')); ?></li>
	</ul>
</div>
