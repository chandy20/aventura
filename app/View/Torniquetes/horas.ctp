<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes minutos" align="center">
    <h1>Reporte Por Hora</h1><br>
    <label>Entrada</label>
    <?php
    echo $this->Form->input('locacione_id', array(
        'label' => '',
        "empty" => "Seleccione una entrada",
    ));
    ?>
    <label>Torniquete</label>
    <?php
    echo $this->Form->input('Torniquete_id', array(
        'label' => '',
        "empty" => "Seleccione un torniquete"
    ));
    ?>
    <br> 
    <label>Fecha</label>
    <div>
        <?php
        echo $this->Form->input('fecha', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
        ?>
        <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" />
        <br>
    </div>
    <label>Hora</label>
    <div align="center">
        <select name="data[Torniquetes][hora]" id="hora">
            <option value="">Seleccione una hora</option>
            <?php
            for ($i = 0; $i < 24; $i++) {
                $hor = 0 + $i;
                $hor2 = "$i";
                if ($i < 10) {
                    $aux = "0" . $hor2;
                } else {
                    $aux = $hor;
                }
                ?> 
                <option value="<?= $hor ?>"><?= $aux ?></option>
            <?php } ?>
        </select>        
        <h1></h1>
        <br><br>
        <input type="button" id="buscar" name="buscar" value="Buscar">
    </div>
    <table class="container">
        <tr>
            <th><div id="graficaCircular"></div></th>
        </tr>
    </table>
</div>
</form>
<script>
    Calendar.setup({
        inputField: "TorniquetesFecha",
        trigger: "selector",
        onSelect: function() {
            this.hide();
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>

    $("#buscar").click(function() {
        var url2 = urlbase + "Torniquetes/reporte.xml";
        var datos2 = {
            fecha: $("#TorniquetesFecha").val(),
            hora: $("#hora").val(),           
            torniquete: $("#TorniquetesTorniqueteId").val(),
            locacion: $("#TorniquetesLocacioneId").val(),
            vista: 3
        };
        if ($("#TorniquetesLocacioneId").val() !== "" || $("#TorniquetesTorniqueteId").val() !== "") {
            if ($("#TorniquetesFecha").val() !== "" && $("#hora").val() !== "" && $("#minuto").val() !== "") {
                ajax(url2, datos2, function(xml) {

                    $("datos", xml).each(function() {
                        var obj = $(this).find("EntradasSalidasDiasParque");
                        var x, y;
                        x = $("entradas", obj).text();
                        y = $("salidas", obj).text();

                        reporte(x, y);
                    });

                });
            } else {
                alert("Debe Seleccionar una fecha completa para la busqueda");
            }
        } else {
            alert("Debe primero seleccionar un torniquete o una Entrada");
        }
    });
    $("#TorniquetesTorniqueteId").change(function() {
        var x = $("#TorniquetesTorniqueteId").val();
        if (x !== "") {
            $('#TorniquetesLocacioneId').prop('disabled', 'disabled');
        }else{
            $('#TorniquetesLocacioneId').prop('disabled', false);
        }       
    });
    $("#TorniquetesLocacioneId").change(function() {
        var x = $("#TorniquetesLocacioneId").val();
        if (x !== "") {
            $('#TorniquetesTorniqueteId').prop('disabled', 'disabled');
        }else{
            $('#TorniquetesTorniqueteId').prop('disabled', false);
        }
    });
    function reporte(x, z) {
        var a = parseInt(x);
        var b = parseInt(z);
        var c = a-b;
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graficaCircular'
            },
            title: {
                text: 'Cantidad de Entradas/Salidas'
            },
            subtitle: {
                text: 'Mundo Aventura aún quedan '+ c + ' personas en el parque'
            },
            plotArea: {
                shadow: null,
                borderWidth: null,
                backgroundColor: null
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.point.name + '</b>: ' + this.y;
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>' + this.point.name + '</b>: ' + this.y;
                        }
                    }
                }
            },
            series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                        ['Entradas', a],
                        ['Salidas', b]
                    ]
                }]
        });
    }

</script>
