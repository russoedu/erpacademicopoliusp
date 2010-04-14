<?php
$this->breadcrumbs=array(
	'Disciplinas',
);
?>

<h1>Disciplinas</h1>

<ul class="actions">
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
