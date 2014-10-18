<div class="users form" align="center">
    <h1>Login</h1>
    <?php
    echo $this->Form->create('User', array(
        'url' => array(
            'controller' => 'users',
            'action' => 'login'
        )
    ));
    ?>
    <table>
        <tr>
            <td>Usuario</td>
            <td><?php echo $this->Form->input('User.username', array('label'=>''));?></td>
        </tr>
        <tr>
            <td>Contraseña</td>
            <td><?php echo $this->Form->input('User.password', array('label'=>''));?></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><?php echo $this->Form->end('Login');?></td>
        </tr>
    </table>
    
</div>