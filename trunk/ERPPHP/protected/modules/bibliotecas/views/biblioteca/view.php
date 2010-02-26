<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->ID,
);
?>
<h1>View Biblioteca #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('Update Biblioteca',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete Biblioteca',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage Biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
		'local',
		'bibliotecario',
		'outros',
	),
)); ?>
