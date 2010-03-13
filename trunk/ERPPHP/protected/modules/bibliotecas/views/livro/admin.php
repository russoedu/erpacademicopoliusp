<?php
$this->breadcrumbs=array(
	'Livros'=>array('index'),
	'Manage',
);
?>
<h1>Manage Livros</h1>

<ul class="actions">
	<li><?php echo CHtml::link('List livro',array('index')); ?></li>
	<li><?php echo CHtml::link('Create livro',array('create')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'id_livro',
		'id_biblioteca',
		'isbn',
		'exemplar',
		'titulo',
		'autor',
		/*
		'editora',
		'ano',
		'edicao',
		'local',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
