<?php if ($_POST) { ?>
    <fieldset>
        <legend>Formulario de Registro de Clientes</legend>
        <form id="forRegCliente" name="forRegCliente" autocomplete="off">
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>CC</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="CC" name="CC" placeholder="Ingrese la CC"/>
                </div>
            </div>
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>Nombre</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese Nombre"/>
                </div>
            </div>
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>Dirección</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="dir" name="dir" placeholder="Ingrese la direccion"/>
                </div>
            </div>
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>Telefono</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="tel" name="tel" placeholder="Ingrese el telefono"/>
                </div>
            </div>
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>Correo</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="correo" name="correo" placeholder="Ingrese el correo"/>
                </div>
            </div>
            <div class="col6 colLeft">
                <div class="col4 colLeft">
                    <label>Confirme Correo</label>
                </div>
                <div class="col8 colLeft">
                    <input type="text" id="correo1" name="correo1" placeholder="Confirme Correo"/>
                </div>
            </div>
            <div class="col12">
                <div class="col6 colLeft">
                    <div class="col12 btn-center">
                        <button class="btn btn-sucess" type="submit">Agregar</button>
                    </div>
                </div>
                <div class="col6 colLeft">
                    <div class="col12 btn-center">
                        <button id="limpiar" class="btn btn-sucess" type="reset">Limpiar</button>
                    </div>
                </div>
            </div>
        </form>
    </fieldset>
    <?php
} else {
    header("location:../.././");
}