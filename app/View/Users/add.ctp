<div class="users form" align="center">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <h1><legend><?php echo __('Crear Usuario'); ?></legend></h1>
        <br>
        <table>
            <tr>
                <td>Nombre de Usuario</td>
                <td><input name="data[User][username]" maxlength="50" id="UserUsername" type="text"></td>
                <td>Contraseña</td>
                <td><input name="data[User][password]" id="UserPassword" type="password"></td>
            </tr>            
            <tr>
                <td>Nombres</td>
                <td><input name="data[User][nombres]" maxlength="50" id="UserNombres" type="text"></td>
                <td>Apellidos</td>
                <td><input name="data[User][apellidos]" maxlength="50" id="UserApellidos" type="text"></td>
            </tr>
            <tr>
                <td>Documento</td>
                <td><input name="data[User][documento]" maxlength="50" id="UserDocumento" type="text"></td>
                <td>Teléfono</td>
                <td><input name="data[User][telefono]" maxlength="50" id="UserTelefono" type="text"></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><input name="data[User][direccion]" maxlength="50" id="direccion" type="text"></td>
                <td>Cargo</td>
                <td><input name="data[User][cargo]" maxlength="50" id="UserCargo" type="text"></td>
            </tr>
            <tr>
                <td>Dependencia</td>
                <td><?php
        echo $this->Form->input('group_id', array('label' => ''));
        ?></td>
            </tr>
        </table>        
        
    </fieldset>
    <br>
    <?php echo $this->Form->end(__('Crear')); ?>
</div>