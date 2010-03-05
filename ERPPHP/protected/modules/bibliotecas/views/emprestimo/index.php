<?php
$this->breadcrumbs=array(
	'Emprestimos',
);
?>

<h1>List emprestimo</h1>

<ul class="actions">
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
	<li><?php echo CHtml::link('Manage emprestimo',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
