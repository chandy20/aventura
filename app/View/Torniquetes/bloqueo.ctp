<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius', 'multi-select'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Bloqueo/Desbloqueo de Torniquetes</h1><br>
    <table cellspacing="10%" cellpading="10%">
        <tr>
            <td colspan="7" align="center"><a id="todos" name="todos" style="cursor:pointer"><h2>PARQUE</h2></a></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><a name="gama" id="gama" style="cursor:pointer"><h2>AMBAR NORTE</h2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="3" align="center"><a name="ambar" id="ambar" style="cursor:pointer" ><h2>GAMA</h2></a></td>
        </tr>
        <tr>
            <td align="center"><a id="g_i" name="g_i" style="cursor:pointer"><H2>IZQUIERDA</H2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="g_d" name="g_d" style="cursor:pointer"><h2>DERECHA</h2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="a_i" name="a_i" style="cursor:pointer"><H2>IZQUIERDA</H2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="a_d" name="a_d" style="cursor:pointer"><h2>DERECHA</h2></a></td>
        </tr>

        <?php
        $a = $ent;
        $v = count($a);
        $b = $entr;
        $v2 = count($b);
        $c = $entra;
        $v3 = count($c);
        $d = $entrad;
        $v4 = count($d);
        $aux = array();
        array_push($aux, $v, $v2, $v3, $v4);
        $val = max($aux);
        for ($i = 0; $i < $val; $i++) {
            ?>
            <tr>
                <td><?php
                    if ($v > $i) {
                        if ($bl[$i] == '0') {
                            echo($this->Form->input($a[$i], array('label' => 'Torniquete ' . $a[$i], 'type' => 'checkbox', 'value' => $a[$i], 'checked' => 'true')));
                        } else {
                            echo($this->Form->input($a[$i], array('label' => 'Torniquete ' . $a[$i], 'type' => 'checkbox', 'value' => $a[$i])));
                        }
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v2 > $i) {
                        if ($bl2[$i] == '0') {
                            echo($this->Form->input($b[$i], array('label' => 'Torniquete ' . $b[$i], 'type' => 'checkbox', 'value' => $b[$i], 'checked' => 'true')));
                        } else {
                            echo($this->Form->input($b[$i], array('label' => 'Torniquete ' . $b[$i], 'type' => 'checkbox', 'value' => $b[$i])));
                        }
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v3 > $i) {
                        if ($bl3[$i] == '0') {
                            echo($this->Form->input($c[$i], array('label' => 'Torniquete ' . $c[$i], 'type' => 'checkbox', 'value' => $c[$i], 'checked' => 'true')));
                        } else {
                            echo($this->Form->input($c[$i], array('label' => 'Torniquete ' . $c[$i], 'type' => 'checkbox', 'value' => $c[$i])));
                        }
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v4 > $i) {
                        if ($bl4[$i] == '0') {
                            echo($this->Form->input($d[$i], array('label' => 'Torniquete ' . $d[$i], 'type' => 'checkbox', 'value' => $d[$i], 'checked' => 'true')));
                        } else {
                            echo($this->Form->input($d[$i], array('label' => 'Torniquete ' . $d[$i], 'type' => 'checkbox', 'value' => $d[$i])));
                        }
                    }
                    ?></td>

                <?php
            }
            ?>        
        </tr>
    </table>

    <div class="control-group">       

    </div>
    <br>        
</div>
<div align="center"><?php echo $this->Form->end(__('Confirmar')); ?></div>
<br>
<div align="center"><h3><?php echo ("Nota: Los torniquetes bloqueados aparecen marcados, los desbloqueados NO"); ?></h3></div>
<div align="center">
    <?php echo $this->Form->create('Torniquetes2'); ?>
    <br>
    <br>
    <h1>Resetear Contadores</h1>
    <br>
    <table cellspacing="10%" cellpading="10%">
        <tr>
            <td colspan="7" align="center"><a id="todos2" name="todos2" style="cursor:pointer"><h2>PARQUE</h2></a></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><a name="gama2" id="gama2" style="cursor:pointer"><h2>AMBAR NORTE</h2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="3" align="center"><a name="ambar2" id="ambar2" style="cursor:pointer" ><h2>GAMA</h2></a></td>
        </tr>
        <tr>
            <td align="center"><a id="g_i2" name="g_i2" style="cursor:pointer"><H2>IZQUIERDA</H2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="g_d2" name="2" style="cursor:pointer"><h2>DERECHA</h2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="a_i2" name="a_i2" style="cursor:pointer"><H2>IZQUIERDA</H2></a></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><a id="a_d2" name="a_d2" style="cursor:pointer"><h2>DERECHA</h2></a></td>
        </tr>

        <?php
        $a = $ent;
        $v = count($a);
        $b = $entr;
        $v2 = count($b);
        $c = $entra;
        $v3 = count($c);
        $d = $entrad;
        $v4 = count($d);
        $aux = array();
        array_push($aux, $v, $v2, $v3, $v4);
        $val = max($aux);
        for ($i = 0; $i < $val; $i++) {
            ?>
            <tr>
                <td><?php
                    if ($v > $i) {
                        echo($this->Form->input($a[$i], array('label' => 'Torniquete' . $a[$i], 'type' => 'checkbox', 'value' => $a[$i])));
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v2 > $i) {
                        echo($this->Form->input($b[$i], array('label' => 'Torniquete ' . $b[$i], 'type' => 'checkbox', 'value' => $b[$i])));
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v3 > $i) {
                        echo($this->Form->input($c[$i], array('label' => 'Torniquete ' . $c[$i], 'type' => 'checkbox', 'value' => $c[$i])));
                    }
                    ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td><?php
                    if ($v4 > $i) {
                        echo($this->Form->input($d[$i], array('label' => 'Torniquete ' . $d[$i], 'type' => 'checkbox', 'value' => $d[$i])));
                    }
                    ?></td>

                <?php
            }
            ?>        
        </tr>
    </table>
    <!--<input type="submit" name="reestablecer" value="Reset Contadores">-->
    <?php echo $this->Form->end(__('Reset Contadores')); ?>
</div>
</form>
<input type="hidden" name="bandera" id="bandera" value="1">
<input type="hidden" name="b_gama" id="b_gama" value="1">
<input type="hidden" name="b_gama_i" id="b_gama_i" value="1">
<input type="hidden" name="b_gama_d" id="b_gama_d" value="1">
<input type="hidden" name="b_gama" id="b_ambar" value="1">
<input type="hidden" name="b_gama_i" id="b_ambar_i" value="1">
<input type="hidden" name="b_gama_d" id="b_ambar_d" value="1">
<input type="hidden" name="bandera" id="bandera2" value="1">
<input type="hidden" name="b_gama" id="b_gama2" value="1">
<input type="hidden" name="b_gama_i" id="b_gama_i2" value="1">
<input type="hidden" name="b_gama_d" id="b_gama_d2" value="1">
<input type="hidden" name="b_gama" id="b_ambar2" value="1">
<input type="hidden" name="b_gama_i" id="b_ambar_i2" value="1">
<input type="hidden" name="b_gama_d" id="b_ambar_d2" value="1">


<script>
    $(document).ready(function() {
        $("#todos").click(function() {
            var bandera = $("#bandera").val();
            if (bandera === '1') {
                for (var i = 1; i <= 16; i++) {
                    $("#Torniquetes" + i).removeAttr('checked');
                    $("#bandera").val('2');
                }
            } else {
                for (var i = 1; i <= 16; i++) {
                    $("#Torniquetes" + i).attr('checked', 'checked');
                    $("#bandera").val('1');
                }
            }
        });
        $("#gama").click(function() {
            var b_gama = $("#b_gama").val();
            if (b_gama === '1') {
                for (var i = 1; i <= 8; i++) {
                    $("#Torniquetes" + i).removeAttr('checked');
                }
                $("#b_gama").val('2');
                $("#b_gama_i").val('2');
                $("#b_gama_d").val('2');
            } else {
                for (var j = 1; j <= 8; j++) {
                    $("#Torniquetes" + j).attr('checked', 'checked');
                }
                $("#b_gama").val('1');
                $("#b_gama_i").val('1');
                $("#b_gama_d").val('1');

            }
        });
        $("#g_i").click(function() {
            var b_gama_i = $("#b_gama_i").val();
            if (b_gama_i === '1') {
                for (var k = 1; k <= 4; k++) {
                    $("#Torniquetes" + k).removeAttr('checked');
                }
                $("#b_gama_i").val('2');
                $("#b_gama").val('2');
            } else {
                for (var k = 1; k <= 4; k++) {
                    $("#Torniquetes" + k).attr('checked', 'checked');
                }
                $("#b_gama_i").val('1');
                $("#b_gama").val('1');
            }
        });
        $("#g_d").click(function() {
            var b_gama_d = $("#b_gama_d").val();
            if (b_gama_d === '1') {
                for (var i = 5; i <= 8; i++) {
                    $("#Torniquetes" + i).removeAttr('checked');
                }
                $("#b_gama").val('2');
                $("#b_gama_d").val('2');
            } else {
                for (var i = 5; i <= 8; i++) {
                    $("#Torniquetes" + i).attr('checked', 'checked');
                }
                $("#b_gama").val('1');
                $("#b_gama_d").val('1');
            }
        });
        $("#ambar").click(function() {
            var b_gama = $("#b_ambar").val();
            if (b_gama === '1') {
                for (var i = 9; i <= 16; i++) {
                    $("#Torniquetes" + i).removeAttr('checked');
                }
                $("#b_ambar").val('2');
                $("#b_ambar_i").val('2');
                $("#b_ambar_d").val('2');
            } else {
                for (var j = 9; j <= 16; j++) {
                    $("#Torniquetes" + j).attr('checked', 'checked');
                }
                $("#b_ambar").val('1');
                $("#b_ambar_i").val('1');
                $("#b_ambar_d").val('1');

            }
        });
        $("#a_i").click(function() {
            var b_gama_i = $("#b_ambar_i").val();
            if (b_gama_i === '1') {
                for (var k = 9; k <= 12; k++) {
                    $("#Torniquetes" + k).removeAttr('checked');
                }
                $("#b_ambar_i").val('2');
                $("#b_ambar").val('2');
            } else {
                for (var k = 9; k <= 12; k++) {
                    $("#Torniquetes" + k).attr('checked', 'checked');
                }
                $("#b_ambar_i").val('1');
                $("#b_ambar").val('1');
            }
        });
        $("#a_d").click(function() {
            var b_gama_d = $("#b_ambar_d").val();
            if (b_gama_d === '1') {
                for (var i = 13; i <= 16; i++) {
                    $("#Torniquetes" + i).removeAttr('checked');
                }
                $("#b_ambar").val('2');
                $("#b_ambar_d").val('2');
            } else {
                for (var i = 13; i <= 16; i++) {
                    $("#Torniquetes" + i).attr('checked', 'checked');
                }
                $("#b_ambar").val('1');
                $("#b_ambar_d").val('1');
            }
        });
        $("#todos2").click(function() {
            var bandera = $("#bandera2").val();
            if (bandera === '1') {
                for (var i = 1; i <= 16; i++) {
                    $("#Torniquetes2" + i).removeAttr('checked');
                    $("#bandera2").val('2');
                }
            } else {
                for (var i = 1; i <= 16; i++) {
                    $("#Torniquetes2" + i).attr('checked', 'checked');
                    $("#bandera2").val('1');
                }
            }
        });
        $("#gama2").click(function() {
            var b_gama = $("#b_gama2").val();
            if (b_gama === '1') {
                for (var i = 1; i <= 8; i++) {
                    $("#Torniquetes2" + i).removeAttr('checked');
                }
                $("#b_gama2").val('2');
                $("#b_gama_i2").val('2');
                $("#b_gama_d2").val('2');
            } else {
                for (var j = 1; j <= 8; j++) {
                    $("#Torniquetes2" + j).attr('checked', 'checked');
                }
                $("#b_gama2").val('1');
                $("#b_gama_i2").val('1');
                $("#b_gama_d2").val('1');

            }
        });
        $("#g_i2").click(function() {
            var b_gama_i = $("#b_gama_i2").val();
            if (b_gama_i === '1') {
                for (var k = 1; k <= 4; k++) {
                    $("#Torniquetes2" + k).removeAttr('checked');
                }
                $("#b_gama_i2").val('2');
                $("#b_gama2").val('2');
            } else {
                for (var k = 1; k <= 4; k++) {
                    $("#Torniquetes2" + k).attr('checked', 'checked');
                }
                $("#b_gama_i2").val('1');
                $("#b_gama2").val('1');
            }
        });
        $("#g_d2").click(function() {
            var b_gama_d = $("#b_gama_d2").val();
            if (b_gama_d === '1') {
                for (var i = 5; i <= 8; i++) {
                    $("#Torniquetes2" + i).removeAttr('checked');
                }
                $("#b_gama2").val('2');
                $("#b_gama_d2").val('2');
            } else {
                for (var i = 5; i <= 8; i++) {
                    $("#Torniquetes2" + i).attr('checked', 'checked');
                }
                $("#b_gama2").val('1');
                $("#b_gama_d2").val('1');
            }
        });
        $("#ambar2").click(function() {
            var b_gama = $("#b_ambar2").val();
            if (b_gama === '1') {
                for (var i = 9; i <= 16; i++) {
                    $("#Torniquetes2" + i).removeAttr('checked');
                }
                $("#b_ambar2").val('2');
                $("#b_ambar_i2").val('2');
                $("#b_ambar_d2").val('2');
            } else {
                for (var j = 9; j <= 16; j++) {
                    $("#Torniquetes2" + j).attr('checked', 'checked');
                }
                $("#b_ambar2").val('1');
                $("#b_ambar_i2").val('1');
                $("#b_ambar_d2").val('1');

            }
        });
        $("#a_i2").click(function() {
            var b_gama_i = $("#b_ambar_i2").val();
            if (b_gama_i === '1') {
                for (var k = 9; k <= 12; k++) {
                    $("#Torniquetes2" + k).removeAttr('checked');
                }
                $("#b_ambar_i2").val('2');
                $("#b_ambar2").val('2');
            } else {
                for (var k = 9; k <= 12; k++) {
                    $("#Torniquetes2" + k).attr('checked', 'checked');
                }
                $("#b_ambar_i2").val('1');
                $("#b_ambar2").val('1');
            }
        });
        $("#a_d2").click(function() {
            var b_gama_d = $("#b_ambar_d2").val();
            if (b_gama_d === '1') {
                for (var i = 13; i <= 16; i++) {
                    $("#Torniquetes2" + i).removeAttr('checked');
                }
                $("#b_ambar2").val('2');
                $("#b_ambar_d2").val('2');
            } else {
                for (var i = 13; i <= 16; i++) {
                    $("#Torniquetes2" + i).attr('checked', 'checked');
                }
                $("#b_ambar2").val('1');
                $("#b_ambar_d2").val('1');
            }
        });
        $("#entrada1").click(function() {
            var url2 = urlbase + "Torniquetes/input.xml";
            var datos = {
                locacion: '1'
            };
            ajax(url2, datos, function(xml) {
                var i = 1;
                $("datos", xml).each(function() {
                    var obj = $(this).find("torniquete");
                    var x = 0;
                    x.concat(i) = $("id", obj).text();
                });

            });
        });
    });

</script>
