<?php
echo $this->Html->script(array('jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Reporte Por Rango de Fechas</h1><br>
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
        var url2 = urlbase + "Torniquetes/reporte.xml";
        var fech1 = new Date($("#TorniquetesFecha").val());
        var fech2 = new Date($("#TorniquetesFecha2").val());
        var f1 = fech1.valueOf();
        var f2 = fech2.valueOf();
        var dias = ((f2 - f1) / (1000 * 60 * 60 * 24)) + 1;
        var datos2 = {
            fecha: $("#TorniquetesFecha").val(),
            fecha2: $("#TorniquetesFecha2").val(),
            entrada: $("#TorniquetesLocacioneId").val(),
            torniquete: $("#TorniquetesTorniqueteId").val(),
            vista: 6,
            dias: dias
        };
        var fech1 = new Date($("#TorniquetesFecha").val());
        var fech2 = new Date($("#TorniquetesFecha2").val());
        var f1 = fech1.valueOf();
        var f2 = fech2.valueOf();
        var dias = (f2 - f1) / (1000 * 60 * 60 * 24);
        if ((Date.parse(fech1)) < (Date.parse(fech2))) {
            if (dias <= 14) {
                if ($("#TorniquetesLocacioneId").val() !== "" || $("#TorniquetesTorniqueteId").val() !== "") {
                    if ($("#TorniquetesFecha").val() !== "") {
                        ajax(url2, datos2, function(xml) {
                            $("datos", xml).each(function() {
                                var obj = $(this).find("EntradasSalidasDiasParque");
                                var x = 0;
                                for (var i = 0; i <= 23; i++) {
                                    if ($("entradas" + i, obj).text() !== '') {
                                        window ['e' + i] = parseInt($("entradas" + i, obj).text());
                                        window ['s' + i] = parseInt($("salidas" + i, obj).text());
                                    } else {
                                        window ['e' + i] = 0;
                                        window ['s' + i] = 0;
                                    }
                                }
                                reporte(e0, e1, e2, e3, e4, e5, e6, e7, e8, e9, e10, e11, e12, e13, s0, s1, s2, s3, s4, s5, s6, s7, s8, s9, s10, s11, s12, s13);
                            });

//                        alert(e9 + " " + e10 + " " + e11 + " " + e12 + " " + e13 + " " + e14 + " " + e15 + " " + e16 + " " + e17 + " " + e18 + " " + e19 + " " + e20 + " " + e21 + " " + e22 + " " + s9 + " " + s10 + " " + s11 + " " + s12 + " " + s13 + " " + s14 + " " + s15 + " " + s16 + " " + s17 + " " + s18 + " " + s19 + " " + s20 + " " + s21 + " " + s22);
                        });


                    } else {
                        alert("Debe especificar la fecha para la consulta");
                    }
                } else {
                    alert("Debe primero seleccionar un torniquete o una Entrada");
                }
            } else {
                alert("el rango de fechas no debe sobrepasar los 14 dias");
            }
        } else {
            alert("La fecha inicial no puede ser mayor que la fecha final");
        }
    }
    );
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
        var salidas = s0 + s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9 + s10 + s11 + s12 + s13;
        chart = new Highcharts.Chart({
            title: {
                text: 'Entradas Totales: ' + entradas + ' - Salidas Totales: ' + salidas,
                x: -20 //center
            },
            chart: {
                renderTo: 'graficaCircular'
            },
            xAxis: {
                categories: ['Día 1', 'Día 2', 'Día 3', 'Día 4', 'Día 5',
                    'Día 6', 'Día 7', 'Día 8', 'Día 9', 'Día 10', 'Día 11', 'Día 12', 'Día 13', 'Día 14']
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
</script>
