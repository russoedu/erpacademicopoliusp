<div class="view">

	<b><?php echo CHtml::encode("Curso");?>:</b>
	<?php echo CHtml::encode(curso::model()->findByPk($data->id_curso)->nome); ?>
	<br />

	<b><?php echo CHtml::encode('Início'); ?>:</b>
	<?php echo CHtml::encode($data->semestre_inicio . ' SEMESTRE - ' . $data->ano_inicio); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
        <?php echo CHtml::encode($data->status); ?>
	<br />

        <?php if ($data->status == 'FORMADO')
              {
                echo '<b>Fim:</b>';
                echo CHtml::encode($data->semestre_fim . ' SEMESTRE - ' . $data->ano_fim);
                echo '</br>';
              }
        ?>

        <?php echo CHtml::link("Editar", array('updateMatricula', 'id_aluno'=>$data->id_aluno, 'id_curso'=>$data->id_curso)); ?>
        <?php echo CHtml::linkButton("Remover", array('submit'=>array('deleteMatricula','id_aluno'=>$data->id_aluno, 'id_curso'=>$data->id_curso),'confirm'=>'Deseja realmente remover esta matrícula?')); ?>
</div>