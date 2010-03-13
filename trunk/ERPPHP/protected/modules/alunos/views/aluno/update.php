<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->id_aluno=>array('view','id'=>$model->id_aluno),
	'Update',
);
?>

<h1>Update aluno <?php echo $model->id_aluno; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Create aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('View aluno',array('view','id'=>$model->id_aluno)); ?></li>
	<li><?php echo CHtml::link('Manage aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>