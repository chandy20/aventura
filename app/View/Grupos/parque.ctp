<div class = "wrap" align='center'>
    <div class = "wrapper">
        <div class = "main">                 
            <h1>Bienvenido a su gestor de reportes del Parque Mundo Aventura</h1>
            <table >
               <tr>
                   <td><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>"><img src="../app/webroot/img/door.png"></a></td>
                   <td><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>"><img src="../app/webroot/img/turnstile.png" width="100" height="148"></a></td>
                </tr>
                
                <tr>
                    <td><a href="<?= $this->Html->url(array("controller" => "Locaciones", "action" => "add")) ?>"><h2>Entradas</h2></td>
                    <td><a href="<?= $this->Html->url(array("controller" => "Torniquetes", "action" => "add")) ?>"><h2>Torniqetes</h2></a></td>
                </tr>
                 
            </table>
        </div>
    </div>
</div>