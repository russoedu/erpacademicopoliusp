<?php
$this->breadcrumbs=array(
	'Disciplinas',
);
?>

<h1>List Disciplina</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create Disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage Disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
