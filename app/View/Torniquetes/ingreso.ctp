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
        <label>Fecha final</label>
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
            if (parseInt(dias) > 0) {
                if (parseInt(dias) < 15) {
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
                            var obj = $(this).find("pasaportes");
                            for (var i = 0; i < 15; i++) {
                                window ['d' + i]=0;
                                window ['z' + i]=0;
                                window ['r' + i]=0;
                            }
                            for (var i = 0; i < dias; i++) {                                
                                window ['d' + i] = parseInt($("diamante" + i, obj).text());
                                window ['z' + i] = parseInt($("zafiro" + i, obj).text());
                                window ['r' + i] = parseInt($("ruby" + i, obj).text());
                            }
                            reporte(d0, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, z1, z2, z3, z4, z5, z6, z7, z8, z9, z10, z11, z12, z13, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, r13);
                        });
                    });
                } else {
                    alert("El rango de fechas no puede ser mayor a 14 dias");
                }
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
    function reporte(d0, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13, z1, z2, z3, z4, z5, z6, z7, z8, z9, z10, z11, z12, z13, r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, r13) {
        chart = new Highcharts.Chart({
            title: {
                text: 'Ingresos al parque por pasaportes',
                x: -20 //center
            },
            chart: {
                renderTo: 'graficaCircular'
            },
            xAxis: {
                categories: ['Día 1', 'Día 2', 'Día 3', 'Día 4', 'Día 5', 'Día 6', 'Día 7', 'Día 8', 'Día 9', 'Día 10', 'Día 11', 'Día 12', 'Día 13', 'Día 14']
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
                    name: 'Diamanate',
                    data: [d0, d1, d2, d3, d4, d5, d6, d7, d8, d9, d10, d11, d12, d13]
                }, {
                    name: 'Zafiro',
                    data: [z1, z2, z3, z4, z5, z6, z7, z8, z9, z10, z11, z12, z13]
                }, {
                    name: 'Ruby',
                    data: [r1, r2, r3, r4, r5, r6, r7, r8, r9, r10, r11, r12, r13]
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
