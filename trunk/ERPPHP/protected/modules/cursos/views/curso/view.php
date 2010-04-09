<?php
$this->breadcrumbs=array(
        'Cursos'=>array('index'),
        $model->nome,
);
?>
<h1><?php echo $model->nome; ?></h1>

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
                
                'nome',
                'duracao',
                'periodo',
                'descricao',
        ),
)); ?>
