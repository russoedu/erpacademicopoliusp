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

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_turma',
		'id_sala',
		'data_inicio',
		'data_fim',
		'vagas',
	),
)); ?>
