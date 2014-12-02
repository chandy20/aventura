<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <table>
        <tr><td>
                <table>
                    <tr>
                        <td align="center"><h1>Entradas y salidas por pasaporte</h1><br></td>
                    </tr>
                    
                    <tr>
                        <td align="center">
                            <label>Fecha</label>
                            <div>
                                <?php
                                echo $this->Form->input('fecha', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
                                ?>
                                <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" />
                                <br><br>
                                <input type="button" id="buscar" name="buscar" value="Buscar">
                            </div></td>
                    </tr>        
                </table>
            </td>           
        </tr>
    </table>
    <table class="container">
        <tr>
            <th><div id="graficaCircular"></div></th>
        </tr>
    </table>
    <table class="container">
        <tr>
            <th><div id="graficaCircular2"></div></th>
        </tr>
    </table>
    <table>
        <div id="obs" name="obs"></div>
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
                    $("#obs").html("var html = '<tr><th  align= 'center'><h1>Observaciones</H1></th></tr>'");
                    $("datos", xml).each(function() {
                        var obj = $(this).find("EntradasSalidasHora");
                        var y = 0;
                        for (var i = 0; i < 14; i++) {
                            window ['e' + i] = parseInt($("entradas" + i, obj).text());
                            window ['s' + i] = parseInt($("salidas" + i, obj).text());                            var obs = $('observacion' + y, obj).text();
                            var html = "<tr><td align='center'>$1</th></tr>";
                            var obs = $("observacion" + i, obj).text();
                            html = html.replace("$1", obs);
                            $("#obs").append(html);
                            y++;
                        }
                        entradas = $("entradas14", obj).text();
                        salidas = $("salidas14", obj).text();
                        torta(entradas, salidas);
                        reporte(e0, e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13, s0, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13);
//                        alert(e9 + " " + e10 + " " + e11 + " " + e12 + " " + e13 + " " + e14 + " " + e15 + " " + e16 + " " + e17 + " " + e18 + " " + e19 + " " + e20 + " " + e21 + " " + e22 + " " + s9 + " " + s10 + " " + s11 + " " + s12 + " " + s13 + " " + s14 + " " + s15 + " " + s16 + " " + s17 + " " + s18 + " " + s19 + " " + s20 + " " + s21 + " " + s22);
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
    function reporte(e0, e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13, s0, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13) {
        var fecha = $("#TorniquetesFecha").val();
        var entradas = e0 + e1 + e2 + e3 + e4 + e5 + e6 + e7 + e8 + e9 + e10 + e11 + e12 + e13;
        var salidas = s0 + s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9 + s10 + s11 + s12 + e13;
        chart = new Highcharts.Chart({
            title: {
                text: 'Entradas Totales: ' + entradas + ' - Salidas Totales: ' + salidas,
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
                    text: 'Cantidad'
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
                    data: [e0, e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13]
                }, {
                    name: 'Salidas',
                    data: [s0, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13]
                }]
        });
    }
    function torta(x, z) {
        var a = parseInt(x);
        var b = parseInt(z);
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graficaCircular2'
            },
            title: {
                text: 'Entradas Totales: ' + a + '. Salidas Totales: ' + b
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
