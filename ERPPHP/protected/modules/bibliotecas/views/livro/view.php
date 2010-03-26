<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view' , 'id'=>$biblioteca->id_biblioteca),
	$model->titulo,
);
?>
<h1>Livro: <?php echo $model->titulo; ?></h1>

<ul class="actions">
	
    <?php
    foreach ($actions as $action) {
        echo "<li>";
        echo $action;
        echo "<li/>";
    }
    ?>
		

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