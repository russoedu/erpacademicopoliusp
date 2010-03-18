<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_retirada'); ?>
                <?php $model->data_retirada=date('Y/m/d');
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'id'=>'dpDataRetirada',
                                'model'=>$model,
                                'attribute'=>'data_retirada',
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
                <?php echo CHtml::error($model,'data_retirada'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_devolucao'); ?>
		<?php $today = date("Y-m-d");// current date
                    $model->data_devolucao = date("Y/m/d",strtotime(date("Y-m-d", strtotime($today)) . " +7 days"));
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

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_aluno'); ?>
		<?php echo CHtml::activeTextField($model,'id_aluno'); ?>
		<?php echo CHtml::error($model,'id_aluno'); ?>
	</div>

	<!--<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_livro'); ?>
		<?php echo CHtml::activeTextField($model,'id_livro'); ?>
		<?php echo CHtml::error($model,'id_livro'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->