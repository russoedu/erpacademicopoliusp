<?php
$this->breadcrumbs=array(
	'Bibliotecarios'=>array('index'),
	$model->id_bibliotecario,
);
?>
<h1>View bibliotecario #<?php echo $model->id_bibliotecario; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List bibliotecario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create bibliotecario',array('create')); ?></li>
	<li><?php echo CHtml::link('Update bibliotecario',array('update','id'=>$model->id_bibliotecario)); ?></li>
	<li><?php echo CHtml::linkButton('Delete bibliotecario',array('submit'=>array('delete','id'=>$model->id_bibliotecario),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage bibliotecario',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_bibliotecario',
		'nome',
		'tbl_users_id',
	),
)); ?>
