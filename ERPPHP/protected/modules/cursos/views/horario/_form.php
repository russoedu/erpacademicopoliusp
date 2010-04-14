<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_oferecimento'); ?>
		<?php echo CHtml::activeTextField($model,'id_oferecimento'); ?>
		<?php echo CHtml::error($model,'id_oferecimento'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'dia'); ?>
		<?php echo CHtml::activeTextField($model,'dia',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo CHtml::error($model,'dia'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'horario_inicio'); ?>
		<?php echo CHtml::activeTextField($model,'horario_inicio'); ?>
		<?php echo CHtml::error($model,'horario_inicio'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'horario_fim'); ?>
		<?php echo CHtml::activeTextField($model,'horario_fim'); ?>
		<?php echo CHtml::error($model,'horario_fim'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->