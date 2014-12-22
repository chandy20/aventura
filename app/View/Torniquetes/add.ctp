<div class="torniquetes form" align='center'>
<?php echo $this->Form->create('Torniquete'); ?>
	<fieldset>
            <legend><h1><?php echo __('Crear Torniquete'); ?></h1></legend>
                <table>
                    <tr>
                        <td>Tipo</td>
                        <td><?php echo $this->Form->input('tipo_id', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Locación</td>
                        <td><?php echo $this->Form->input('locacione_id', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Grupo</td>
                        <td><?php echo $this->Form->input('grupo_id', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Serial</td>
                        <td><?php echo $this->Form->input('serial', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>IP</td>
                        <td><?php echo $this->Form->input('ip', array('label'=>''));?></td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td><?php echo $this->Form->input('descripcion', array('label'=>''));?></td>
                    </tr>
                </table>	
	</fieldset>
<?php echo $this->Form->end(__('Crear')); ?>
</div>
