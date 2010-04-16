<?php
$this->breadcrumbs=array(
	'Alunos'=>array('index'),
	$model->nome,
);
?>
<h1>Vizualização de Aluno</h1>

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
		'id_aluno:raw:Número do Aluno',
		'nome',
		'rg:raw:RG',
		'cpf:raw:CPF',
		'endereco:raw:Endereço',
		'telefone',
		'celular',
		'email:raw:E-mail',
	),
)); ?>
