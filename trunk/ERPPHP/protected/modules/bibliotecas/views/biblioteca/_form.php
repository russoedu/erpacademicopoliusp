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
		<?php echo CHtml::activeLabelEx($model,'local'); ?>
		<?php echo CHtml::activeTextField($model,'local',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'local'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'bibliotecario'); ?>
		<?php echo CHtml::activeTextField($model,'bibliotecario',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'bibliotecario'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'outros'); ?>
		<?php echo CHtml::activeTextField($model,'outros',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'outros'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->