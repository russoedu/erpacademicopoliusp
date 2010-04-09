<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'tbl_users_id'); ?>
		<?php echo CHtml::activeTextField($model,'tbl_users_id'); ?>
		<?php echo CHtml::error($model,'tbl_users_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->