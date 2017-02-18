<!DOCTYPE html>
<html>
<!-- HEADER MENU -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link href="<?= base_url('assets/template/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/template/') ?>css/datepicker3.css" rel="stylesheet">
    <link href="<?= base_url('assets/template/') ?>css/bootstrap-iso.css" rel="stylesheet">

    <link href="<?= base_url('assets/template/') ?>css/css.css" rel="stylesheet"> <!-- VER POR TABLA DE ANALISIS-->
    <link href="<?= base_url('assets/template/') ?>css/jquery-ui.css" rel="stylesheet"> <!-- AUTOCOMPLETAR!!-->
    <!--para ver iconos-->
    <link href="<?= base_url('assets/template/') ?>css/styles.css" rel="stylesheet"><!-- ver iconos del menu-->

    <!--Icons-->
    <script src="<?= base_url('assets/template/') ?>js/lumino.glyphs.js"></script> <!-- ???? -->

    <script src="<?=base_url('assets/template/')?>js/jquery-1.4.2.min.js"></script><!--PARA FOCO Y NUM DE PROTOCOLO-->
    <script src="<?=base_url('assets/template/')?>js/autocomplete.jquery.js"></script><!-- AUTOCOMPLETAR!!-->
    <script src="<?=base_url('assets/template/')?>js/scripts/ingresar_ordenes.js"></script><!-- INGRESAR_ORDENES!!-->
    <!--[if lt IE 9]>
    <script src="<?=base_url('assets/template/')?>js/html5shiv.js"></script>
    <script src="<?=base_url('assets/template/')?>js/respond.min.js"></script>
    <![endif]-->

    <!-- AUTOCOMPLETAR -->
    <script>
        $('.autocomplete').autocomplete();

        $(function () {
            var availableTags=[<?php foreach($medicos as $filas):echo '"'.$filas['apellidomedico'];?>",<?php
            endforeach;?>]
            $("#tags-medico").autocomplete({
                source: availableTags
            });
        });
        $(function () {
            var availableTags=[<?php foreach($obrassociales as $filas):echo '"'.$filas['nombreobrasocial'];?>",<?php
            endforeach;?>]
                $("#tags-OS").autocomplete({
                    source: availableTags
                });
        });
        $(function () {
            var availableTags=[<?php foreach($analisis as $filas):echo '"'.$filas['nombreanalisis'];?>",<?php
            endforeach;?>]
                $("#tags-analisis").autocomplete({
                    source: availableTags
                });
        });
    </script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>"><span><b>Laboratorio</b></span> Umbrella</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg>
                        Homero <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">
                                <svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>
                                Perfil</a></li>
                        <li><a href="#">
                                <svg class="glyph stroked gear">
                                    <use xlink:href="#stroked-gear"></use>
                                </svg>
                                Configurar</a></li>
                        <li><a href="#">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li class="<?= (isset($ingresar_ordenes)) ? 'active' : '' ?>"><a href="<?= base_url('ingresar_ordenes') ?>">
                <svg class="glyph stroked pencil">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-pencil"></use>
                </svg>
                Ingresar Ordenes</a></li>
        <li class="<?= (isset($ingresar_resultados)) ? 'active' : '' ?>"><a
                href="<?= base_url('ingresar_resultados') ?>">
                <svg class="glyph stroked pencil">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-pencil"></use>
                </svg>
                Ingresar Resultados</a></li>

        <li><a href="charts.html">
                <svg class="glyph stroked line-graph">
                    <use xlink:href="#stroked-line-graph"></use>
                </svg>
                Consultar Información</a></li>
        <li><a href="tables.html">
                <svg class="glyph stroked table">
                    <use xlink:href="#stroked-table"></use>
                </svg>
                Facturación</a></li>
        <li><a href="panels.html">
                <svg class="glyph stroked app-window">
                    <use xlink:href="#stroked-app-window"></use>
                </svg>
                Caja</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="login.html">
                <svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg>
                Login Page</a></li>
    </ul>

</div>
<!--/.sidebar-->
<!-- FIN HEADER MENU -->


