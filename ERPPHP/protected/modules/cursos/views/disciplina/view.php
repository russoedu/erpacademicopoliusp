<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->nome,
);
?>
<h1>Disciplina <?php echo $model->nome; ?></h1>

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
	'data'=>$data,
	'attributes'=>array(
                array(
                    'label'=>'Professor Responsável pela disciplina',
                    'type'=>'raw',
                    'value'=>$data['professor'],
                ),
                array(
                    'label'=>'Nome da disciplina',
                    'type'=>'raw',
                    'value'=>$data['nome'],
                ),
                array(
                    'label'=>'Sigla',
                    'type'=>'raw',
                    'value'=>$data['sigla'],
                ),
                array(
                    'label'=>'Créditos Aula',
                    'type'=>'raw',
                    'value'=>$data['creditos_aula'],
                ),
                array(
                    'label'=>'Créditos Trabalho',
                    'type'=>'raw',
                    'value'=>$data['creditos_trabalho'],
                ),
                array(
                    'label'=>'Semestre',
                    'type'=>'raw',
                    'value'=>$data['semestre'],
                ),
                array(
                    'label'=>'Programa',
                    'type'=>'text',
                    'value'=>$data['programa'],
                ),
            
	),
)); ?>
