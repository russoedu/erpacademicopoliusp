<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'nome'); ?>
		<?php echo CHtml::activeTextField($model,'nome',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'disciplina_id'); ?>
		<?php echo CHtml::activeTextField($model,'disciplina_id'); ?>
		<?php echo CHtml::error($model,'disciplina_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->