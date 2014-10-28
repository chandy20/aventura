<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Reporte Por Mes</h1><br>
    <label>Entrada</label>            
    <?php echo $this->Form->input('locacione_id', array('label' => '', "empty" => "Seleccione una entrada")); ?>
    <br>
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
        dateFormat: "%Y-%m"
    });
</script>
<script>
    $("#buscar").click(function() {
        var url2 = urlbase + "Torniquetes/reporte.xml";
        var datos2 = {
            fecha: $("#TorniquetesFecha").val(),
            entrada: $("#TorniquetesLocacioneId").val(),
            torniquete: $("#TorniquetesTorniqueteId").val(),
            vista: 4
        };
        if ($("#TorniquetesLocacioneId").val() !== "" || $("#TorniquetesTorniqueteId").val() !== "") {
            if ($("#TorniquetesFecha").val() !== "") {
                ajax(url2, datos2, function(xml) {

                    $("datos", xml).each(function() {
                        var obj = $(this).find("EntradasSalidasDiasParque");
                        var x, y;
                        x = $("entradas", obj).text();
                        y = $("salidas", obj).text();

                        reporte(x, y);
                    });

                });
            }else{
                alert("Debe especificar la fecha para la consulta");
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
                text: 'Mundo Aventura'
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
