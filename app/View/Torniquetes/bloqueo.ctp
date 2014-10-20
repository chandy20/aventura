<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('jscal2', 'steel', 'border-radius', 'multi-select'));
?>
<?php echo $this->Form->create('Torniquetes'); ?>
<div class="torniquetes dia" align="center">
    <h1>Bloqueo/Desbloqueo de Torniquetes</h1><br>
    <table cellspacing="10%" cellpading="10%">
        <tr>
            <td colspan="7" align="center"><h1><input type="button" id="todos" name="todos" id="todos" value="Todos"></h1></td>
        </tr>
        <tr>
            <td colspan="3" align="center"><h2>GAMA</h2></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="3" align="center"><h2>AMBAR NORTE</h2></td>
        </tr>
        <tr>
            <td align="center"><H2>DERECHA</H2></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><h2>IZQUIERDA</h2></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><H2>DERECHA</H2></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td align="center"><h2>IZQUIERDA</h2></td>
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
<div align="center"><?php echo $this->Form->end(__('Operación')); ?></div>

<div align="center">
    <?php echo $this->Form->create('Torniquetes'); ?>
    <br>
    <br>
    <h1>Resetear Contadores</h1>
    <br>
    <!--<input type="submit" name="reestablecer" value="Reset Contadores">-->
    <?php echo $this->Form->end(__('Reset Contadores')); ?>
</div>
</form>
<input type="hidden" name="bandera" id="bandera" value="1">


<script>
    $(document).ready(function() {
        $("#todos").click(function() {
            var bandera = $("#bandera").val();
            if (bandera === '1') {
                $('input:checkbox').removeAttr('checked');
                $("#bandera").val('2');
            } else {
                $('input:checkbox').attr('checked', 'checked');
                $("#bandera").val('1');
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
