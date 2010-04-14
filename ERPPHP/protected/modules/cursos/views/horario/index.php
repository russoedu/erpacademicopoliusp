<?php
$this->breadcrumbs=array(
	'Horarios',
);
?>

<h1>List horario</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create horario',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage horario',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
