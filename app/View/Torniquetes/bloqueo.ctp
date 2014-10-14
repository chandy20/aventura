<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius', 'multi-select'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Bloqueo/Desbloqueo de Toriniquetes</h1><br>
    <table>
        <tr>
            <td> <label>Entrada</label>            
                <?php echo $this->Form->input('locacione_id', array('label' => '', "empty" => "Seleccione una entrada")); ?></td>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php //echo '	 '?>
            </td>
            <td><label>Entrada</label>            
                <?php echo $this->Form->input('locacione_id2', array('label' => '',
                     "options" => $locaciones2,
                    "empty" => "Seleccione una entrada"));
                ?></td>
        </tr>
    </table>

    <br>
    <div class="control-group"  >

        <label>Torniquete</label>
        <?php
        echo $this->Form->input('torniquetes', array(
            "div" => array(
                "class" => "controls"
            ),
            "label" => "",
            "options" => $torniquetes,
            "multiple" => true
        ));
//                    
        ?>
    </div>
    <br>
    <label>Fecha</label>
    <div>        
        <input type="button" id="accion" name="bloquear" value="Bloquear">
    </div>
    <table class="container">
        <tr>
            <th><div id="graficaCircular"></div></th>
        </tr>
    </table>
</div>
</form>

<script>
    $('#TorniquetesTorniquetes').multiSelect({
        afterSelect: function(values) {
            $('#TorniquetesTorniquetes option[value="' + values + '"]').attr("selected", "selected")
        }
    });
    $("#bloquear").click(function() {
        var url2 = urlbase + "Torniquetes/reporte.xml";
        var datos2 = {
            fecha: $("#TorniquetesFecha").val(),
            entrada: $("#TorniquetesLocacioneId").val(),
            torniquete: $("#TorniquetesTorniqueteId").val(),
            vista: 0
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
            } else {
                alert("Debe especificar la fecha para la consulta");
            }
        } else {
            alert("Debe primero seleccionar un torniquete o una Entrada");
        }
    });
    function reporte(x, z) {
        var a = parseInt(x);
        var b = parseInt(z);
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
