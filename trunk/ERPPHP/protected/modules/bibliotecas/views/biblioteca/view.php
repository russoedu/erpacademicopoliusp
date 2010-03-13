<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('index'),
	$model->id_biblioteca,
);
?>
<h1>View biblioteca #<?php echo $model->id_biblioteca; ?></h1>

<ul class="actions">
	<li><?php echo CHtml::link('List biblioteca',array('index')); ?></li>
        <li><?php echo CHtml::link('Adicionar livro', array('/bibliotecas/livro/create','bib'=>$model->id_biblioteca));?></li>
        <li><?php echo CHtml::link('Empréstimos', array('/bibliotecas/emprestimo/index','bib'=>$model->id_biblioteca));?></li>
	<li><?php echo CHtml::link('Create biblioteca',array('create')); ?></li>
	<li><?php echo CHtml::link('Update biblioteca',array('update','id'=>$model->id_biblioteca)); ?></li>
	<li><?php echo CHtml::linkButton('Delete biblioteca',array('submit'=>array('delete','id'=>$model->id_biblioteca),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php echo CHtml::link('Manage biblioteca',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_biblioteca',
		'nome',
		'local',
	),
)); ?>

<?php $this->widget('zii.widgets.CListView' , array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_viewLivro',
));

