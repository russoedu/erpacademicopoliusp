<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id_disciplina,
);
?>
<h1>View disciplina #<?php echo $model->id_disciplina; ?></h1>

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
		'id_disciplina',
		'id_curso',
		'id_professor_responsavel',
		'nome',
		'sigla',
		'creditos_aula',
		'creditos_trabalho',
		'semestre',
		'programa',
	),
)); ?>
