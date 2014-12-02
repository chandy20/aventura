<div class="torniquetes dia" align="center">
    <br>
    <h1>Bienvenido por favor selecciona el reporte que deseas ejecutar</h1>
    <br>
    <table class="container">
        <thead>
            <tr>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "minutos")) ?>"><h2>MINUTO</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "horas")) ?>"><h2>HORA</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "dia")) ?>"><h2>DIA</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "rango")) ?>"><h2>RANGO</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "mes")) ?>"><h2>MES</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "anio")) ?>"><h2>AÑO</h2></a></td>
            </tr>
        </thead>
    </table>
    <br><br><br>
    <div class = "clear" align="center">
        <table class="">
            <tr>
                <td><a href="<?=  $this->Html->url(array("controller" => "Observaciones", "action" => "add")) ?>"><img src="../app/webroot/img/observaciones.png" width="130" height="130" style="cursor:pointer" id="tor"></a></td>
            </tr>
            <tr>
                <td><a href="<?=  $this->Html->url(array("controller" => "Observaciones", "action" => "add")) ?>"><h2 style="cursor:pointer">OBSERVACIONES</h2></a></td>
            </tr>
        </table>
    </div>

</div>
