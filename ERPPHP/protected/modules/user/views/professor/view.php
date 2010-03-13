<?php
$this->breadcrumbs=array(
	'Professors'=>array('index'),
	$model->id_professor,
);
?>
<h1>View professor #<?php echo $model->id_professor; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List professor',array('index')); ?></li>
	<li><?php echo CHtml::link('Create professor',array('create')); ?></li>
	<li><?php echo CHtml::link('Update professor',array('update','id'=>$model->id_professor)); ?></li>
	<li><?php echo CHtml::linkButton('Delete professor',array('submit'=>array('delete','id'=>$model->id_professor),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage professor',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_professor',
		'nome',
		'tbl_users_id',
	),
)); ?>
