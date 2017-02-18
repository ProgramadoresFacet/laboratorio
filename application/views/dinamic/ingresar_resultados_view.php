<!-- MAIN INGRESAR RESULTADOS -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ingresar Resultados</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">

            <div class="col-lg-2">
                <h4>Buscar Paciente:</h4>
            </div>
            <div class="col-lg-10">
                <form class="form-horizontal" id="frm1" method="POST" data-toggle="validator" role="form">
                    <div class="form-group col-sm-10">
                        <label class="col-sm-2 control-label">Criterio:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="criterio">
                                <option id="crit1">Numero de Protocolo</option>
                                <option id="crit2">Nombre del Paciente</option>
                                <option id="crit3">Fecha</option>                                
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-10">
                        <label class="col-sm-2 control-label">Filtro:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="filtro" name="filtro" required>
                        </div>
                    </div>                  
                    
                    <div class="form-group">
                        <div class="col-sm-2">
                            <input id="btn-buscar" class="btn btn-success" type="submit" value="Buscar">
                            
                            <!--<button type="submit" class="btn btn-success">Buscar</button>-->
                        </div>
                    </div>                    
                </form>

                <!--<p id="demo"></p> table-responsive-->
            </div>         

            
                
            
            <div class="col-lg-6" style="overflow: auto; height: 280px; margin-bottom: 50px;">
                <h4>Ordenes:</h4>
                <table multiple class="table table-striped" id="tablaorden">
                    <tr>
                        <th class="col-lg-3">Nº de Protocolo</th>
                        <th class="col-lg-6">Nombre</th> 
                        <th class="col-lg-3">Fecha</th>
                    </tr>
                </table>
            </div>
              

           
            <div class="col-lg-6">
                <h4>Análisis:</h4>
                <div class="table-responsive" style="overflow: auto; height: 280px; margin-bottom: 10px;">
                    <table multiple class="table table-striped" id="tablaanalisis">
                        <tr>
                            <th class="col-lg-6">Nombre</th>
                            <th class="col-lg-2">Código</th> 
                            <th class="col-lg-2">Autorizado</th>
                            <th class="col-lg-2">Eliminar</th>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-10">
                <button type="button" class="btn btn-success">Imprimir</button>
            </div>
            
            
        </div><!--/.col-->
    </div><!--/.row-->
</div>	<!--/.main-->
<!-- FIN MAIN INGRESAR RESULTADOS -->
