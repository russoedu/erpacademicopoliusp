<div class="view">

	<b><?php echo CHtml::encode("Oferecimento"); ?>:</b>
        <?php $oferecimento=oferecimento::model()->findByPk($data->id_oferecimento);
            echo CHtml::link(CHtml::encode(disciplina::model()->findByPk($oferecimento->id_disciplina)->nome . '-' .$oferecimento->id_turma),
                array('view', 'id'=>$data->id_oferecimento)); ?>
	<br />

	<b><?php echo CHtml::encode("Professor"); ?>:</b>
	<?php echo CHtml::encode(professor::model()->findByPk($oferecimento->id_professor)->nome); ?>
	<br />

	<b><?php echo CHtml::encode("Turma"); ?>:</b>
	<?php echo CHtml::encode($oferecimento->id_turma); ?>
	<br />

	<b><?php echo CHtml::encode("Sala"); ?>:</b>
	<?php echo CHtml::encode($oferecimento->id_sala); ?>
	<br />

	<b><?php echo CHtml::encode("Data de Início"); ?>:</b>
	<?php echo CHtml::encode(date("d/m/Y", strtotime($oferecimento->data_inicio))); ?>
	<br />

	<b><?php echo CHtml::encode("Data de Término"); ?>:</b>
	<?php echo CHtml::encode(date("d/m/Y", strtotime($oferecimento->data_fim))); ?>
	<br />

        <?php if(isset($data->nota_final)){
                echo "<b>";
                echo CHtml::encode("Nota Final");
                echo ":</b>";
                echo CHtml::encode($data->nota_final);
                echo "<br />";
            }
        ?>
	

        <?php if(isset($data->frequencia_final)){
                echo "<b>";
                echo CHtml::encode("Frequência Final"); 
                echo ":</b>";
                echo CHtml::encode($data->frequencia_final*10 . "%");
                echo "<br />";
            }
        ?>
	
        <b><?php echo CHtml::encode("Status"); ?>:</b>
	<?php if($data->aprovado == 0){
            echo CHtml::encode("Não aprovado");
        }
        else {
            echo CHtml::encode("Aprovado"); 
        }
           ?>
	<br />
</div>