<?php
$this->breadcrumbs=array(
	'Bibliotecas'=>array('/bibliotecas/biblioteca/index'),
        $biblioteca->nome=>array('/bibliotecas/biblioteca/view','id'=>$biblioteca->id_biblioteca),
        $livro->titulo=>array('/bibliotecas/livro/view','id'=>$livro->id_livro),
	'Visualização de Empréstimo',
);
?>
<h1>Visualização do Empréstimo</h1>

<ul class="actions">
	<li><?php 
            if (!isset($model->data_devolucao_efetiva))
                echo CHtml::link('Editar Empréstimo',array('update','id'=>$model->id_emprestimo)); ?></li>
</ul><!-- actions -->

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array(
                    'label'=>'Título do Livro',
                    'type'=>'raw',
                    'value'=>$livro->titulo,
                    ),
		array(
                    'label'=>'Nome do Aluno',
                    'type'=>'raw',
                    'value'=>$aluno->nome,
                    ),
                array(
                    'label'=>'Número de Matrícula',
                    'type'=>'raw',
                    'value'=>$aluno->id_aluno,
                    ),
                array(
                    'label'=>'Data de Retirada',
                    'type'=>'raw',
                    'value'=>date("d/m/Y", strtotime($model->data_retirada)),
                    ),
		array(
                    'label'=>'Data de Devolução',
                    'type'=>'raw',
                    'value'=>date("d/m/Y", strtotime($model->data_devolucao)),
                    ),
	),
)); ?>
