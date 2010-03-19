<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

        <?php echo CHtml::errorSummary($model); ?>

        <div class="row">
		<?php echo CHtml::activeLabel($livro,'titulo'); ?>
		<?php echo CHtml::activeTextField($livro,'titulo', array('readonly'=>'readonly')); ?>
	</div>

        <div class="row">
		<?php echo CHtml::activeLabel($model,'id_aluno'); ?>
		<?php echo CHtml::activeTextField($model,'id_aluno',Array('readonly'=>'readonly')); ?>
		<?php echo CHtml::error($model,'id_aluno'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($aluno,'nome'); ?>
		<?php echo CHtml::activeTextField($aluno,'nome',Array('readoly'=>'readonly')); ?>
		<?php echo CHtml::error($aluno,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'data_retirada'); ?>
                <?php $model->data_retirada = date("d/m/Y",strtotime(date("Y-m-d", strtotime($model->data_retirada))));
                    echo CHtml::activeTextField($model,'data_retirada', Array('readonly'=>'readonly'));
                ?>
                <?php echo CHtml::error($model,'data_retirada'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_devolucao'); ?>
		<?php $model->data_devolucao = date("Y/m/d",strtotime(date("Y-m-d", strtotime($model->data_devolucao)))); 
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'id'=>'dpDataDevolucao',
                                'model'=>$model,
                                'attribute'=>'data_devolucao',
                                'language'=>'pt-br',
                                'options'=>array(
                                    'showAnim'=>'fold',
                                    ),
                                'htmlOptions'=>array(
                                    'style'=>'height:20px;'
                                    ),
                                )
                            );
                ?>
		<?php echo CHtml::error($model,'data_devolucao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Salvar'); ?>
                <?php echo CHtml::submitButton('Reportar Devolução', Array('submit'=>'index.php?r=/bibliotecas/emprestimo/ReportReturn&id_livro=' . $livro->id_livro)); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->