<?php
$this->breadcrumbs=array(
	'Disciplinas',
);
?>

<h1>List disciplina</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create disciplina',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage disciplina',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
