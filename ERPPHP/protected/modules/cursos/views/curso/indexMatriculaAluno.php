<?php
$this->breadcrumbs=array(
	'Alunos'=>array('/alunos/aluno/index'),
	$aluno->nome=>array('/alunos/aluno/view','id'=>$aluno->id_aluno),
        'Matrículas do Aluno'
);
?>

<h1>Matrículas do Aluno</h1>

<ul class="actions">
    <?php
    foreach ($actions as $action) {
        echo "<li>";
        echo $action;
        echo "<li/>";
    }
    ?>
</ul><!-- actions -->

<?php
    $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewMatricula',
)); ?>
