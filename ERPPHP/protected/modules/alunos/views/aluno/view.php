<?php
$this->breadcrumbs=array(
        'Alunos'=>array('index'),
        $model->id_aluno,
);
?>
<h1>Aluno <?php echo $model->id_aluno; ?></h1>

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
                'id_aluno',
                'nome',
                'rg',
                'cpf',
                'endereco',
                'telefone',
                'celular',
                'email',
                'tbl_users_id',
        ),
)); ?>
