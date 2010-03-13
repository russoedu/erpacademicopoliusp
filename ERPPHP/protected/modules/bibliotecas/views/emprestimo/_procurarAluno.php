<div class="form">

<?php echo CHtml::beginForm() ; ?>

    <div class="row">
        <?php echo "Número de matrícula" ?>
        <br/>
        <?php echo CHtml::textField("aluno_id")?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Selecionar' ); ?>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>