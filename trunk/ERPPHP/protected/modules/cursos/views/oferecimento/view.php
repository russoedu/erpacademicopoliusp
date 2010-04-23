<?php
$this->breadcrumbs=array(
	'Oferecimentos'=>array('index'),
);
?>
<h1><?php echo disciplina::model()->findByPk($model->id_disciplina)->nome . '-' . $model->id_turma; ?></h1>

<ul class="actions">
	   <?php
    foreach ($actions as $action){
        echo "<li>";
        echo $action;
        echo "<li/>";
    } ?>
</ul><!-- actions -->
<?php
    $dias = array(
                'SEGUNDA'=>'Segunda-feira',
                'TERÇA'=>'Terça-feira',
                'QUARTA'=>'Quarta-feira',
                'QUINTA'=>'Quinta-feira',
                'SEXTA'=>'Sexta-feira',
        );
    ?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'attributes'=>array(
                array(
                    'label'=>'Disciplina',
                    'type'=>'raw',
                    'value'=>CHtml::link($data['disciplina'],array('/cursos/disciplina/view', 'id'=>$data['id_disciplina'])),
                ),
                array(
                    'label'=>'Professor Responsável pelo Oferecimento',
                    'type'=>'raw',
                    'value'=>$data['professor'],
                ),
                array(
                    'label'=>'Turma',
                    'type'=>'raw',
                    'value'=>$data['id_turma'],
                ),
                array(
                    'label'=>'Sala',
                    'type'=>'raw',
                    'value'=>$data['sala'],
                ),
                array(
                    'label'=>'Dia da semana',
                    'type'=>'raw',
                    'value'=>$dias[$data['dia']],
                ),
                array(
                    'label'=>'Data de início',
                    'type'=>'raw',
                    'value'=>date('d/m/Y', strtotime($data['data_inicio'])) ,
                ),
                array(
                    'label'=>'Data de fim',
                    'type'=>'raw',
                    'value'=>date('d/m/Y', strtotime($data['data_fim'])) ,
                ),
		array(
                    'label'=> 'Vagas do oferecimento',
                    'type'=>'raw',
                    'value'=>$data['vagas'],
                ),
	),
        
)); ?>
