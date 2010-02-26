<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Create',
);
?>
<h1>Create Aluno</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List Aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage Aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>