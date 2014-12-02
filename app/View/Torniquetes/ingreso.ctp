<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Reporte Pasaportes</h1><br>

    <label>Fecha inicial</label>
    <div>
        <?php
        echo $this->Form->input('fecha', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
        ?>
        <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" />
        <br>
        <label>Fecha inicial</label>
        <?php
        echo $this->Form->input('fecha2', array('label' => '', 'maxlength' => '15', 'readonly' => 'readonly', 'required' => 'true'));
        ?>
        <img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector2" name="selector2" style="cursor:pointer" />
        <br><br>
        <input type="button" id="buscar" name="buscar" value="Buscar">
    </div>
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
    Calendar.setup({
        inputField: "TorniquetesFecha2",
        trigger: "selector2",
        onSelect: function() {
            this.hide();
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    $("#buscar").click(function() {
        var f = new Date();
        f.getFullYear() + "-" + (f.getMonth() + 1) + "-" + f.getDate();
        var url2 = urlbase + "Torniquetes/reporte.xml";
        var fech1 = new Date($("#TorniquetesFecha").val());
        var fech2 = new Date($("#TorniquetesFecha2").val());
        var f1 = fech1.valueOf();
        var f2 = fech2.valueOf();
        var dias = ((f2 - f1) / (1000 * 60 * 60 * 24)) + 1;
        var datos2 = {
            fecha: $("#TorniquetesFecha").val(),
            vista: 7,
            dias: dias
        };
        if ($("#TorniquetesFecha").val() !== "" && $("#TorniquetesFecha2").val() !== "") {
            if (parseInt(dias) > 1) {
                ajax(url2, datos2, function(xml) {
                    $("datos", xml).each(function() {
                        var obj = $(this).find("pasaporte");
                        var con = parseInt($("con", obj).text());
                        var sin = parseInt($("sin", obj).text());
                        torta(con, sin);
                    });
                });
                var datos2 = {
                    fecha: $("#TorniquetesFecha").val(),
                    vista: 8,
                    dias: dias
                };
                ajax(url2, datos2, function(xml) {
                    $("datos", xml).each(function() {

                    });
                });
            } else {
                alert("La fecha inicial no puede ser mayor a la final");
            }
        } else {
            alert("Debe especificar la fecha inicial y final para la consulta");
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
                text: 'Con pasaporte: ' + a + '. Sin Pasaporte: ' + b
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
                        ['Con pasaporte', a],
                        ['Sin pasaporte', b]
                    ]
                }]
        });
    }
</script>
