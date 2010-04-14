<?php
$this->breadcrumbs=array(
	'Horarios'=>array('index'),
	$model->id_horario=>array('view','id'=>$model->id_horario),
	'Update',
);
?>

<h1>Update horario <?php echo $model->id_horario; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List horario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create horario',array('create')); ?></li>
	<li><?php echo CHtml::link('View horario',array('view','id'=>$model->id_horario)); ?></li>
	<li><?php echo CHtml::link('Manage horario',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>