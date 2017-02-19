<!-- MAIN INGRESAR ORDENES -->
<form id="form_ing_ord" class="form-horizontal form-label-left" name="form_ppal">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <!-- TITULO -->
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <div class="x_title">
                    <h1 class="page-header">Ingresar Ordenes</h1>
                </div>
            </div>
        </div>


        <!-- FORM -->
        <div class="row">
            <div class="x_panel">
                <div class="x_content">
                    <br/>

                    <!-- IZQUIERDA -->
                    <div class="col-md-6  col-xs-12 col-md-6 col-md-push-6">
                        <form class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12">Numero de Protocolo</label>

                                <div class="col-md-3 col-sm-3 col-xs-12" id="protocolo">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12" for="date">Fecha</label>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input id="fecha" type="date" class="form-control"
                                           + value="<?php date_default_timezone_set('America/Buenos_Aires');
                                    echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- DERECHA -->
                    <div class="col-md-6 col-xs-12 col-md-6 col-md-pull-6">

                        <form class="form-horizontal form-label-left">

                            <div class="item form-group">
                                <label class=" col-md-4 col-sm-4 col-xs-12 ">Apellido del Paciente<span
                                        + class="required">*</span></label>

                                <div id="div_apellido" class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="apellido" type="text" data-validate-length-range="6"
                                           + class="form-control"
                                           + placeholder="" required="required">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12">Nombre del Paciente</label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="nombre" type="text" class="form-control" placeholder=""
                                           required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12" for="tags-medico">Apellido del M?dico</label>

                                <div class="ui-widget col-md-8 col-sm-8 col-xs-12">
                                    <input id="tags-medico" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12" for="tags-OS">Obra Social</label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="tags-OS" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12">N?mero de Orden</label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="num_orden" type="text" class="form-control" placeholder="" value="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-12">N?mero de Afiliado</label>

                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input id="num_afil" type="text" class="form-control" placeholder="" value="0">
                                </div>
                            </div>

                        </form>
                    </div>


                </div>
            </div>
        </div>

        <!-- INPUT ANALISIS Y BOTONES DE TABLA -->
        <div class="row">
            <div class="x_panel">
                <div class="x_content">

                    <div class="col-md-6 col-xs-12">

                        <form class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="col-md-4 col-sm-4 col-xs-14" for="tags-analisis">An?lisis:</label>

                                <div class="col-md-8 col-sm-8 col-xs-14">
                                    <input id="tags-analisis" type="text" class="form-control">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-xs-12">

                        <form class="form-horizontal form-label-left">

                            <div class="col-md-8 col-sm-8 col-xs-14">
                                <button id="bt_add" type="submit" class="btn btn-success">Agregar</button>
                                <button id="bt_del" type="reset" class="btn btn-primary">Eliminar</button>
                                <button id="bt_delall" type="reset" class="btn btn-primary">Eliminar todo</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- TABLA DE ANALISIS Y BOTONES DEL FORM-->
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">
                                    <th class="column-title">N?mero</th>
                                    <th class="column-title">Nombre</th>
                                    <th class="column-title">C?digo</th>
                                    <th class="column-title">Autorizado</th>
                                    <th class="column-title">Eliminar</th>
                                    </th>
                                </tr>
                                </thead>

                                <tbody id="tbody">
                                </tbody>
                            </table>
                        </div>


                        <div class="col-md-6 col-xs-12">

                            <form class="form-horizontal form-label-left">

                                <!--div class="form-group">
+                                        <label class="col-md-6 col-sm-6 col-xs-14" >Precio An?lisis:</label>
+
+                                        <div id="precio_analisis" class="col-md-6 col-sm-6 col-xs-14">
+                                        </div>
+
+                                    </div-->
                                <div class="form-group">
                                    <label class="col-md-6 col-sm-6 col-xs-14">Precio Total:</label>

                                    <div id="precio_total" class="col-md-6 col-sm-6 col-xs-14">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-6 col-sm-6 col-xs-14">Precio Pagado:</label>

                                    <div id="pagado" class="col-md-6 col-sm-6 col-xs-14">
                                        <input type="text" class="form-control" id="pagado_inp">
                                    </div>

                                </div>
                            </form>
                        </div>


                        <!-- BOTONES -->
                        <div class="col-md-6  col-xs-12">
                            <form class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button id="limpiar" type="reset" class="btn btn-primary">Limpiar</button>
                                        <button id="enviar" class="btn btn-success">Aceptar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-success" style="display:none" role="alert"><strong>Orden ingresada!</strong>
            Se ingres? la orden con ?xito.
        </div>
        <div class="alert2 alert-danger" style="display:none" role="alert"><strong>Orden no ingresada!</strong>
            Ocurri? un error al ingresar la orden.
        </div>
        <br><br>
    </div>

</form>

-<!-- FIN MAIN INGRESAR ORDENES -->
