<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update emprestimo <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
	<li><?php echo CHtml::link('View emprestimo',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>