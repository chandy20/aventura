<div class="locaciones form" align='center'>
<?php echo $this->Form->create('Locacione'); ?>
	<fieldset>
            <legend><h1><?php echo __('Editar Entrada'); ?></h1></legend>
                <table>
                    <tr>
                        
                        <td><?php echo $this->Form->input('id', array('style'=>'display:none'));?></td>
                    </tr>
                    <tr>
                        <td>Código de Entrada</td>
                        <td><?php echo $this->Form->input('cod_locacion', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Nombre de Entrada</td>
                        <td><?php echo $this->Form->input('nombre_locacion', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Nombre de Entrada</td>
                        <td><?php echo $this->Form->input('descripcion', array('label'=>''));?></td>
                    </tr>
                </table>
	</fieldset>
<?php echo $this->Form->end(__('Editar')); ?>
</div>
