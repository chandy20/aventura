<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Reporte Por Día</h1><br>
    <label>Entrada</label>            
    <?php echo $this->Form->input('locacione_id', array('label' => '', "empty" => "Seleccione una entrada")); ?>
    <br>
    <label>Torniquete</label>
    <?php
    echo $this->Form->input('Torniquete_id', array(
        'label' => '',
        "empty" => "Seleccione un torniquete",
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
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    $("#buscar").click(function() {
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
                        var obj = $(this).find("EntradasSalidasHora");
                        var x = 0;
                        var bandera = true;
                        for (var i = 9; i <= 23; i++) {
                            for (var j = x; j <= 23; j++) {
                                fecha = $("fecha" + j, obj).text();
                                hora = parseInt(fecha.substring(11, 13));
                                if (hora === i) {
                                    window ['e' + i] = parseInt($("entradas" + j, obj).text());
                                    window ['s' + i] = parseInt($("salidas" + j, obj).text());
                                    bandera = false;
                                    x = j;
                                    break;
                                } 
                            }
                            if (bandera === true) {
                                window ['e' + i] = 0;
                                window ['s' + i] = 0;
                            }
                            bandera = true;
                            alert(window ['e' + i] + ' ' + i);
                        }
                        reporte(e9, e10, e11, e12, e13, e14, e15, e16, e17, e18, e19, e20, e21, e22, s9, s10, s11, s12, s13, s14, s15, s16, s17, s18, s19, s20, s21, s22);
                        alert(e9 + " " + e10 + " " + e11 + " " + e12 + " " + e13 + " " + e14 + " " + e15 + " " + e16 + " " + e17 + " " + e18 + " " + e19 + " " + e20 + " " + e21 + " " + e22 + " " + s9 + " " + s10 + " " + s11 + " " + s12 + " " + s13 + " " + s14 + " " + s15 + " " + s16 + " " + s17 + " " + s18 + " " + s19 + " " + s20 + " " + s21 + " " + s22);
                    });
                });
            } else {
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
        } else {
            $('#TorniquetesLocacioneId').prop('disabled', false);
        }
    });
    $("#TorniquetesLocacioneId").change(function() {
        var x = $("#TorniquetesLocacioneId").val();
        if (x !== "") {
            $('#TorniquetesTorniqueteId').prop('disabled', 'disabled');
        } else {
            $('#TorniquetesTorniqueteId').prop('disabled', false);
        }
    });
    function reporte(e9, e10, e11, e12, e13, e14, e15, e16, e17, e18, e19, e20, e21, e22, s9, s10, s11, s12, s13, s14, s15, s16, s17, s18, s19, s20, s21, s22) {
        var fecha = $("#TorniquetesFecha").val();
        var entradas = e9+e10+e11+e12+e13+e14+e15+e16+e17+e18+e19+e20+e21+e22;
        var salidas = s9+s10+s11+s12+s13+s14+s15+s16+s17+s18+s19+s20+s21+s22;
        var total = entradas - salidas;
        chart = new Highcharts.Chart({
            title: {
                text: 'Entradas y Salidas del día ' + fecha,
                x: -20 //center
            },
            chart: {
                renderTo: 'graficaCircular'
            },
            xAxis: {
                categories: ['09:00', '10:00', '11:00', '12:00', '13:00',
                    '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00']
            },
            yAxis: {
                title: {
                    text: 'Cantidad de entradas/Salidas quedan '+ total + ' personas en el parque'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: ' Personas'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                    name: 'Entradas',
                    data: [e9, e10, e11, e12, e13, e14, e15, e16, e17, e18, e19, e20, e21, e22]
                }, {
                    name: 'Salidas',
                    data: [s9, s10, s11, s12, s13, s14, s15, s16, s17, s18, s19, s20, s21, s22]
                }]
        });
    }
</script>
