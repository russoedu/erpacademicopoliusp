<?php
$this->breadcrumbs=array(
	'Turmas',
);
?>

<h1>List Turma</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create Turma',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage Turma',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
