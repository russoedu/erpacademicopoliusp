<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);
?>

<h1>Update Aluno <?php echo $model->ID; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create Aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('View Aluno',array('view','id'=>$model->ID)); ?></li>
	<li><?php echo CHtml::link('Manage Aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>