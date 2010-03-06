<?php
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->ID,
);
?>
<h1>View curso #<?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List curso',array('index')); ?></li>
	<li><?php echo CHtml::link('Create curso',array('create')); ?></li>
	<li><?php echo CHtml::link('Update curso',array('update','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::linkButton('Delete curso',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage curso',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
	),
)); ?>
