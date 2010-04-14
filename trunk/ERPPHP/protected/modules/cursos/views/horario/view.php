<?php
$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->id_horario,
);
?>
<h1>View horario #<?php echo $model->id_horario; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List horario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create horario',array('create')); ?></li>
	<li><?php echo CHtml::link('Update horario',array('update','id'=>$model->id_horario)); ?></li>
	<li><?php echo CHtml::linkButton('Delete horario',array('submit'=>array('delete','id'=>$model->id_horario),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage horario',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_horario',
		'id_oferecimento',
		'dia',
		'horario_inicio',
		'horario_fim',
	),
)); ?>
