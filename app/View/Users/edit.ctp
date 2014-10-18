<div class="users form" align="center">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <h1><legend><?php echo __('Editar Usuario'); ?></legend></h1>
        <br>
        <?php
        echo $this->Form->input('id');
        ?>
        <table>
            <tr>
                <td>Nombre de Usuario</td>
                <td><?php echo $this->Form->input('username', array('label' => '')); ?></td>
                <td>Contraseña</td>
                <td><?php echo $this->Form->input('password', array('label'=>'')); ?></td>
            </tr>
            <tr>
                <td>Nombres</td>
                <td><?php echo $this->Form->input('nombres', array('label'=>''));?></td>
                <td>Apellidos</td>
                <td><?php echo $this->Form->input('apellidos', array('label'=>'')); ?></td>
            </tr>
            <tr>
                <td>Documento</td>
                <td><?php echo $this->Form->input('documento', array('label'=>''));?></td>
                <td>Teléfono</td>
                <td><?php echo $this->Form->input('telefono', array('label'=>'')); ?></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><?php echo $this->Form->input('direccion', array('label'=>''));?></td>
                <td>Cargo</td>
                <td><?php echo $this->Form->input('cargo', array('label'=>''));?></td>
            </tr>
            <tr>
                <td>Dependencia</td>
                <td><?php echo $this->Form->input('group_id', array('label'=>''));?></td>
                
            </tr>
        </table>        
    </fieldset>
    <?php echo $this->Form->end(__('odificar')); ?>
</div>