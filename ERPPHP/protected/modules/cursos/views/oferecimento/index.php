<?php
$this->breadcrumbs=array(
	'Oferecimentos',
);
?>

<h1>Oferecimentos</h1>

<ul class="actions">
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
