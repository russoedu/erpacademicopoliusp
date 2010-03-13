<?php
$this->breadcrumbs=array(
	'Emprestimos'=>array('index'),
	'Manage',
);
?>
<h1>Manage Emprestimos</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List emprestimo',array('index')); ?></li>
	<li><?php echo CHtml::link('Create emprestimo',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_emprestimo',
		'data_retirada',
		'data_devolucao',
		'id_aluno',
		'id_livro',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
