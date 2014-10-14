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
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "mes")) ?>"><h2>MES</h2></a></td>
                <td align="center"><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "anio")) ?>"><h2>AÑO</h2></a></td>
            </tr>
        </thead>
    </table>
    <div class = "clear"></div>

</div>
