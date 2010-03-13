<?php
$this->breadcrumbs=array(
	'Alunos',
);
?>

<h1>List aluno</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
