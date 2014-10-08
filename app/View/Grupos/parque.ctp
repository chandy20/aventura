<div class = "wrap" align='center'>
    <div class = "wrapper">
        <div class = "main">                 
            <h1>Bienvenido a su gestor de reportes del Parque Mundo Aventura</h1>
            <table >
                <tr>
                    <td><img src="../app/webroot/img/door.png" style="cursor:pointer" id="door"></td>
                    <td><img src="../app/webroot/img/turnstile.png" width="100" height="148" style="cursor:pointer" id="tor"></a></td>
                </tr>                
                <tr>
                    <td><h2 style="cursor:pointer" id="dor">Entradas</h2></td>
                    <td><h2 style="cursor:pointer" id="to">Torniqetes</h2></a></td>
                </tr>                 
            </table>
            <div id="access" name="access" style="display:none">
                <table >
                    <tr>
                        <td><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>"><img src="../app/webroot/img/door.png"></a></td>
                        <td><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "index")) ?>"><img src="../app/webroot/img/door.png"></a></td>
                    </tr>                
                    <tr>
                        <td><h3 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>">Crear Entrada</a></h3></td>
                        <td><h3 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "index")) ?>">Ver Entradas</a></h3></a></td>
                    </tr>                 
                </table>
            </div>
            <div id="torni" name="torni" style="display:none">
                <table >
                    <tr>
                        <td><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="148"></a></td>
                        <td><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "index")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="148"></a></td>
                    </tr>                
                    <tr>
                        <td><h3 style="cursor:pointer" id="dor"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>">Crear Torniquete</a></h3></td>
                        <td><h3 style="cursor:pointer" id="to"><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "index")) ?>">Ver Torniquetes</a></h3></a></td>
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
        });
        $("#tor").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'block';
        });
        $("#dor").click(function() {
            document.getElementById('access').style.display = 'block';
            document.getElementById('torni').style.display = 'none';
        });
        $("#to").click(function() {
            document.getElementById('access').style.display = 'none';
            document.getElementById('torni').style.display = 'block';
        });

    });
</script>