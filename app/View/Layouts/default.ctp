<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Mundo Aventura');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?></title>

        <?php
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        echo $this->Html->script(array('jquery.form', 'jquery-1.11.0.min'));
        ?>
        <title>Mundo Aventura</title>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <meta name = "viewport" content = "width=device-width, initial-scale=1, maximum-scale=1">
        <!--google fonts-->
        <link href = 'http://fonts.googleapis.com/css?family=Merriweather+Sans' rel = 'stylesheet' type = 'text/css'>
        <!--end google fonts -->
        <!--<link href = "css/style.css" rel = "stylesheet" type = "text/css" media = "all" />-->
        <?=$this->Html->css("style");?>
        <?=$this->Html->css("tabla");?>
        <?=$this->Html->script("jquery");?>
        <?=$this->Html->script("highstock");?>
        <?=$this->Html->script("exporting");?>
        <?=$this->Html->script("operaciones");?>
        <?=$this->Html->script("jquery.min");?>
    </head>
    <body>
        <!--start header -->
        <div class = "header_bg">
            <div class = "wrap">
                <div class = "wrapper">
                    <div class = "header">
                        <div class = "logo">
                            <a><img src = "<?php echo $this->webroot .'/img/logo.png' ?>" alt = ""/> </a>
                        </div>
                        <div class = "cssmenu">
                            <ul>
                                <li><a class = "home" href="http://localhost/aventura" ></a></li>
                                <li><a href="<?=  $this->Html->url(array("controller" => "Grupos", "action" => "parque")) ?>">Parque</a></li>
                                <li><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "reportes")) ?>">Reportes</a></li>
                                <li><a href="<?=  $this->Html->url(array("controller" => "Torniquetes", "action" => "dia")) ?>">Reportes Por Día</a></li>
                                <li><a>Reportes por Mes</a></li>
                                <li><a>Reportes por Año</a></li>
                                <div class = "clear"></div>
                            </ul>
                        </div>
                        <div class = "clear"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--start sub-header -->
        
        <!--start main -->
        <div class = "wrap">
            <div class = "wrapper">
                <div class = "main">
                   <?php
                echo $this->Session->flash();
                ?>
                   
                <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
        <!-- start footer -->
        <div class="wrap">
            <div class="footer">
                
                <div class="copy">	
                    <p class="w3-link"></p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </body>
</html>