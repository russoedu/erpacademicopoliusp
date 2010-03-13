<div class="form">

<?php echo CHtml::beginForm(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_retirada'); ?>
		<?php echo CHtml::activeTextField($model,'data_retirada'); ?>
		<?php echo CHtml::error($model,'data_retirada'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'data_devolucao'); ?>
		<?php echo CHtml::activeTextField($model,'data_devolucao'); ?>
		<?php echo CHtml::error($model,'data_devolucao'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_aluno'); ?>
		<?php echo CHtml::activeTextField($model,'id_aluno'); ?>
		<?php echo CHtml::error($model,'id_aluno'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'id_livro'); ?>
		<?php echo CHtml::activeTextField($model,'id_livro'); ?>
		<?php echo CHtml::error($model,'id_livro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->