<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'aluno_id'); ?>
		<?php echo CHtml::activeTextField($model,'aluno_id'); ?>
		<?php echo CHtml::error($model,'aluno_id'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'livro_id'); ?>
		<?php echo CHtml::activeTextField($model,'livro_id'); ?>
		<?php echo CHtml::error($model,'livro_id'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_emprestimo'); ?>
		<?php echo CHtml::activeTextField($model,'data_emprestimo'); ?>
		<?php echo CHtml::error($model,'data_emprestimo'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_combinada'); ?>
		<?php echo CHtml::activeTextField($model,'data_combinada'); ?>
		<?php echo CHtml::error($model,'data_combinada'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->