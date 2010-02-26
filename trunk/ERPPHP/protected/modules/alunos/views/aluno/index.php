<?php
$this->breadcrumbs=array(
	'Alunos',
);
?>

<h1>List Aluno</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create Aluno',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage Aluno',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
