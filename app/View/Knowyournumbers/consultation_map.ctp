<h3>Map of Consultations</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '1000px',
    'height'     => '800px',
    'localize'   => false,
    'zoom'       => 13,
	'address'    => 'San Francisco, CA',
    'marker'     => false,
    'infoWindow' => true
  );
?>

<div>
	<?= $this->GoogleMap->map($map_options); ?>


<?php 
	$count = 0;
	foreach($chwConsultations as $chwConsultation) {
		$longitude = (float)$chwConsultation['Knowyournumber']['longitude'];
		$latitude = (float)$chwConsultation['Knowyournumber']['latitude'];
		$id = $chwConsultation['Knowyournumber']['id'];
		$time = $chwConsultation['Knowyournumber']['time'];
		$height = $chwConsultation['Knowyournumber']['height'];
		$weight = $chwConsultation['Knowyournumber']['weight'];
		$systolic = $chwConsultation['Knowyournumber']['systolic'];
		$diastolic = $chwConsultation['Knowyournumber']['diastolic'];
		$bmi = $bmi = $this->CoFunctions->computeBMI($weight, $height);
		
		
		$markerTitle = $id . " - " . $time;
		$windowText = "<table><tr><td>Height</td><td>$height</td><tr>".
		"<tr><td>Weight</td><td>$weight</td></tr>".
		"<tr><td>BMI</td><td>$bmi</td></tr>".
		"<tr><td>Blood pressure</td><td>$systolic / $diastolic</td></tr>";
		
		$marker_options = array('markerTitle' => $markerTitle, 'windowText' => $windowText);
		
		echo $this->GoogleMap->addMarker("map_canvas", $count, array('latitude' => $latitude, 'longitude' => $longitude), $marker_options);
		$count++;
	}
?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Knowyournumbers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Knowyournumber'), array('action' => 'add')); ?> </li>
	</ul>
</div>