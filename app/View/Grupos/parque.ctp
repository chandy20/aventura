<div class = "wrap" align='center'>
    <div class = "wrapper">
        <div class = "main">                 
            <h1>Bienvenido a su gestor de reportes del Parque Mundo Aventura</h1>
            <table >
                <tr>
                    <td align="center"><img src="../app/webroot/img/users.png" width="100" height="120" style="cursor:pointer" id="usu"></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><img src="../app/webroot/img/door.png" width="100" height="120" style="cursor:pointer" id="door"></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><img src="../app/webroot/img/turnstile.png" width="100" height="120" style="cursor:pointer" id="tor"></a></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><img src="../app/webroot/img/pasaporte.png" width="100" height="120" style="cursor:pointer" id="pas"></a></td>
                </tr>                
                <tr>
                    <td align="center"><h2 style="cursor:pointer" id="usua">USUARIOS</h2></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><h2 style="cursor:pointer" id="dor">ENTRADAS</h2></td>
                    <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><h2 style="cursor:pointer" id="to">TORNIQUETES</h2></a></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td align="center"><h2 style="cursor:pointer" id="pa">PASAPORTES</h2></a></td>
                </tr>                 
            </table>
            <div id="access" name="access" style="display:none">
                <table >
                    <tr>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>"><img src="../app/webroot/img/door.png" "width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "index")) ?>"><img src="../app/webroot/img/door.png" width="100" height="120"></a></td>
                    </tr>                
                    <tr>
                        <td align="center"><h2 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>">Crear Entrada</a></h2></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "index")) ?>">Ver Entradas</a></h2></a></td>
                    </tr>                 
                </table>
            </div>
            <div id="users" name="users" style="display:none">
                <table >
                    <tr>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "add")) ?>"><img src="../app/webroot/img/users.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "index")) ?>"><img src="../app/webroot/img/users.png" width="100" height="120"></a></td>
                    </tr>                
                    <tr>
                        <td align="center"><h2 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "add")) ?>">Crear Usuario</a></h2></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "index")) ?>">Ver Usuarios</a></h2></a></td>
                    </tr>                 
                </table>
            </div>
            <div id="torni" name="torni" style="display:none">
                <table >
                    <tr>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "index")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "bloqueo")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="120"></a></td>
                    </tr>                
                    <tr>
                        <td align="center"><h2 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>">Crear Torniquete</a></h2></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "index")) ?>">Ver Torniquetes</a></h2></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "bloqueo")) ?>">Bloquear/desbloquear</a></h2></a></td>
                    </tr>                 
                </table>
            </div>
            <div id="pasaporte" name="pasaporte" style="display:none">
                <table>
                    <tr>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Brazaletes", "action" => "add")) ?>"><img src="../app/webroot/img/pasaporte.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Brazaletes", "action" => "add")) ?>"><img src="../app/webroot/img/pasaporte.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><a href="<?= $this->Html->url(array("controller" => "Brazaletes", "action" => "activar")) ?>"><img src="../app/webroot/img/pasaporte.png" width="100" height="120"></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center"><h2 style="cursor:pointer" id="pass"><a href="<?= $this->Html->url(array("controller" => "TipoBrazaletes", "action" => "index")) ?>">Tipos de Pasaporte</a></h2></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Brazaletes", "action" => "add")) ?>">Crear Pasaporte</a></h2></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td align="center"><h2 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Brazaletes", "action" => "activar")) ?>">Activar Pasaporte</a></h2></a></td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#door").click(function() {
            document.getElementById('access').style.display = 'block';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'none';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#tor").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('users').style.display = 'none';
            document.getElementById('torni').style.display = 'block';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#dor").click(function() {
            document.getElementById('access').style.display = 'block';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'none';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#to").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'block';
            document.getElementById('users').style.display = 'nome';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#usu").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'block';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#usua").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'block';
            document.getElementById('pasaporte').style.display = 'none';
        });
        $("#pas").click(function(){
            document.getElementById('pasaporte').style.display = 'block';
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'none';
        });
        $("#pa").click(function(){
            document.getElementById('pasaporte').style.display = 'block';
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'none';
        });
        $("#pass").click(function(){
            document.getElementById('pasaporte').style.display = 'block';
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'none';
            document.getElementById('users').style.display = 'none';
        });
    });
</script>