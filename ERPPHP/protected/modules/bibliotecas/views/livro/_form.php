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
		<?php echo CHtml::activeLabelEx($model,'autor'); ?>
		<?php echo CHtml::activeTextField($model,'autor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'autor'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'ISDN'); ?>
		<?php echo CHtml::activeTextField($model,'ISDN'); ?>
		<?php echo CHtml::error($model,'ISDN'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'numClassfica'); ?>
		<?php echo CHtml::activeTextField($model,'numClassfica',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'numClassfica'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'editor'); ?>
		<?php echo CHtml::activeTextField($model,'editor',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'editor'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'ano'); ?>
		<?php echo CHtml::activeTextField($model,'ano'); ?>
		<?php echo CHtml::error($model,'ano'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'local'); ?>
		<?php echo CHtml::activeTextField($model,'local',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo CHtml::error($model,'local'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'biblioteca_id'); ?>
		<?php echo CHtml::activeTextField($model,'biblioteca_id'); ?>
		<?php echo CHtml::error($model,'biblioteca_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->