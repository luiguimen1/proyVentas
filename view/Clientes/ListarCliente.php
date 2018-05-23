<?php
if ($_POST) {
    require '../../CLASS/BD/MySQLi.php';
    require '../../CLASS/BD/datos.php';
    require '../../CLASS/DAO/ClienteDAO.php';
    require '../../CLASS/VO/ClienteVO.php';

    $ClienteDAO = new ClienteDAO();
    $data = $ClienteDAO->listar();
    ?>
    <fieldset>
        <legend>Listado de clientes</legend>
        <center><h2>Clientes ordenados por Nombre</h2></center>
        <center>
            <table border="5" style="width: 95%;">
                <thead>
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dir</th>
                        <th>Telefono</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < sizeof($data); $i++) {
                        $ClienteVO = $data[$i];
                        ?>
                        <tr id="Cliente<?= $ClienteVO->getId(); ?>">
                            <td><?php echo $ClienteVO->getCc() ?></td>
                            <td><?= $ClienteVO->getNombre() ?></td>
                            <td><?= $ClienteVO->getCorreo() ?></td>
                            <td><?= $ClienteVO->getDire() ?></td>
                            <td><?= $ClienteVO->getTel() ?></td>
                            <td><button class="EliCli btn-warning" codCliente="<?= $ClienteVO->getId(); ?>">Eliminar</button></td>
                        </tr>                   
                    <?php } ?>
                </tbody>
            </table>
        </center>
    </fieldset>
    <?php
} else {
    header("location:../../");
}