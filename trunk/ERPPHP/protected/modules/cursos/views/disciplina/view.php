<?php
$this->breadcrumbs=array(
	'Disciplinas'=>array('index'),
	$model->id_disciplina,
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
	'data'=>$model,
	'attributes'=>array(
		'id_professor_responsavel',
		'nome',
		'sigla',
		'creditos_aula',
		'creditos_trabalho',
		'semestre',
		'programa',
	),
)); ?>
