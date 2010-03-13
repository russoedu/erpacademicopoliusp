<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->id_biblioteca=>array('view','id'=>$model->id_biblioteca),
	'Update',
);
?>

<h1>Update biblioteca <?php echo $model->id_biblioteca; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List biblioteca',array('index')); ?></li>
	<li><?php echo CHtml::link('Create biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('View biblioteca',array('view','id'=>$model->id_biblioteca)); ?></li>
	<li><?php echo CHtml::link('Manage biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>