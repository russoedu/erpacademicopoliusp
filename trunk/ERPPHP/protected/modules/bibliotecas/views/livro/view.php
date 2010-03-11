<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->ID),
	$model->nome,
);
?>
<h1>Detalhes Livro #<?php echo $model->nome; ?></h1>

<ul class="actions">
	<li><?php# echo CHtml::link('List Livro',array('index')); ?></li>
	<li><?php# echo CHtml::link('Create Livro',array('create')); ?></li>
	<li><?php echo CHtml::link('Update Livro',array('update','id'=>$model->ID)); ?></li>
        <li><?php echo CHtml::link('Emprestar Livro',array('/bibliotecas/emprestimo/create','livro_id'=>$model->ID));?>
	<li><?php echo CHtml::linkButton('Delete Livro',array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure to delete this item?')); ?></li>
	<li><?php# echo CHtml::link('Manage Livro',array('admin')); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'nome',
		'autor',
		'ISDN',
		'numClassfica',
		'editor',
		'ano',
		'local',
		'biblioteca_id',
	),
)); ?>
