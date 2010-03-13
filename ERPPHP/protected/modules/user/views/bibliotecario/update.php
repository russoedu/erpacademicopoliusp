<?php
$this->breadcrumbs=array(
	'Bibliotecarios'=>array('index'),
	$model->id_bibliotecario=>array('view','id'=>$model->id_bibliotecario),
	'Update',
);
?>

<h1>Update bibliotecario <?php echo $model->id_bibliotecario; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List bibliotecario',array('index')); ?></li>
	<li><?php echo CHtml::link('Create bibliotecario',array('create')); ?></li>
	<li><?php echo CHtml::link('View bibliotecario',array('view','id'=>$model->id_bibliotecario)); ?></li>
	<li><?php echo CHtml::link('Manage bibliotecario',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>