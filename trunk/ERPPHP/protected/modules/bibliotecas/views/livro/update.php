<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->id_biblioteca),
	$model->titulo => array('view' ,'id'=>$model->id_livro ),
	'Editar Livro',
);
?>

<h1>Editar livro: <?php echo $model->titulo; ?></h1>

<ul class="actions">
	<!-- <li><?php echo CHtml::link('Listar livros',array('index')); ?></li> -->
	<!-- <li><?php echo CHtml::link('Criar livro',array('create')); ?></li> -->
	<!-- <li><?php echo CHtml::link('Ver livro',array('view','id'=>$model->id_livro)); ?></li> -->
	<!-- <li><?php echo CHtml::link('Gerenciar livro',array('admin')); ?></li> -->	
</ul><!-- actions -->

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>