<?php
if($_POST){
    ?>
<div class="col12">
    <div class="col4 colLeft">
        <div class="btn btn-sucess col8" id="ForAddCliente">Agregar</div>
    </div>
    <div class="col4 colLeft">
        <div class="btn btn-sucess col8" id="ListaCliente">Listar</div>
    </div>
    <div class="col4 colLeft">
        <div class="btn btn-sucess col8" id="BuscarCliente">Buscar</div>
    </div>
</div>
<div class="col12" id="detodo"></div>
<?php
}else{
    header("location:../.././");
}