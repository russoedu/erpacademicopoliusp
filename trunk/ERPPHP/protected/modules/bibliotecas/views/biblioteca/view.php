<?php
$this->breadcrumbs=array(
        'Bibliotecas'=>array('index'),
        $model->nome,
);
?>

<h1>Biblioteca: <?php echo $model->nome; ?></h1>

<ul class="actions">
   <?php
    foreach ($actions as $action){
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
                'local',
        ),
)); ?>

<br />


<?php echo CHtml::beginForm(); ?>
    <div class="row">
		<?php echo CHtml::textField('txtSearch', substr($search, 1, strlen($search)-2));?>
                <?php echo CHtml::submitButton('Buscar', Array('submit'=>'index.php?r=/bibliotecas/biblioteca/view&id=' . $model->id_biblioteca)); ?>
    </div>

    <div class="row buttons">
                
    </div>
<?php echo CHtml::endForm(); ?>


<?php
if ($dataProvider->itemCount > 0) {
    $this->widget('zii.widgets.CListView' , array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_viewLivro',
    ));
}
else
    echo 'Nenhum livro cadastrado na biblioteca';
?>

