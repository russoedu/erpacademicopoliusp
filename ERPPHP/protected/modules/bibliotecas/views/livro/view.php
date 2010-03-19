<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->id_biblioteca),
	$model->titulo,
);
?>
<h1>Livro: <?php echo $model->titulo; ?></h1>

<ul class="actions">
	
		<li><?php echo CHtml::link('Editar Livro',array('update','id'=>$model->id_livro)); ?></li>
        
		<li><?php echo CHtml::linkButton('Remover Livro',array('submit'=>array('delete','id'=>$model->id_livro),'confirm'=>'Deseja realmente remover este livro?')); ?></li>
        
		<!--<li><?php echo CHtml::link('Novo Livro',array('create')); ?></li>-->
        
		<li><?php if($status == 'Disponível')
                    echo CHtml::link('Emprestar Livro',array('/bibliotecas/emprestimo/create','id_livro'=>$model->id_livro));
                  else
                    echo CHtml::link('Renovar Empréstimo',array('/bibliotecas/emprestimo/update','id_livro'=>$model->id_livro)); ?></li>
        
		<!--<li><?php echo CHtml::link('Listar Livros',array('index')); ?></li>-->
	
		<!--<li><?php echo CHtml::link('Gerenciar Livros',array('admin')); ?></li>-->

</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'titulo:raw:Título',
                'autor',
                'isbn:raw:ISBN',
		'editora',
		'ano',
		'edicao:raw:Edição',
                'exemplar',
		'local',
                array(
                    'label'=>'Status',
                    'type'=>'raw',
                    'value'=>$status,
                    ),
	),
)); ?>