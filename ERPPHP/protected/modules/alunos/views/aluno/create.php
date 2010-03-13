<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	'Create',
);
?>
<h1>Create aluno</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List aluno',array('index')); ?></li>
	<li><?php echo CHtml::link('Manage aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>