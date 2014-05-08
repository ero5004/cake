<h3>Map of Consultations</h3>

<?= $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false); ?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=false', false); ?>

<?php
  $map_options = array(
    'id'         => 'map_canvas',
    'width'      => '500px',
    'height'     => '500px',
    'localize'   => false,
    'zoom'       => 10,
    'address'    => 'Manhattan, NY',
    'marker'     => true,
    'infoWindow' => true
  );
?>

<div>
	<?= $this->GoogleMap->map($map_options); ?>
</div>