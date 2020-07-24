<?php
require_once '../shared/sessions.php';
require_once  '../shared/db.php';
require_once  '../shared/guard.php';
require_once  '../shared/header.php';
if ($_SESSION['user_admin'] == 'f') {
$id;
?>

    <section class="section">
        <div class="container">

            <h3 class="title">Lista compras realizadas</h3>
            <?php if ($factura_model->find($_SESSION['user_id'])) { ?>
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
                    <thead>
                        <tr>
                            <th width="30%" class="has-text-centered">Fecha</th>
                            <th width="40%" class="has-text-centered">Total</th>
                            <th width="30%" class="has-text-centered">Detalles</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $facturas = $factura_model->find($_SESSION['user_id']);
                        if ($facturas) {
                            foreach ($facturas as $factura) {
                                $id = $factura['id'];
                                $precio = $factura['fecha'];
                                $cantidad = $factura['total'];
                        ?>
                                <tr>
                                    <td width="30%" class="has-text-centered"><?php echo $factura['fecha'] ?></td>

                                    <td width="40%" class="has-text-centered"> <?php echo $factura['total'] ?> </td>
                                    <td>
                                        <div class="popover is-popover-bottom">
                                            <button class="button is-primary popover-trigger">Ver datalles</button>
                                            <div class="popover-content">
                                            <?php
                            }
                                                    $detalles = $factura_model->findDetalle($id);
                                                    foreach ($detalles as $detalle) {
                                                        $description = $detalle['descripcion'];
                                                        $preciounitario = $detalle['preciounitario'];
                                                        $cantidad = $detalle['cantidad'];
                                                    ?>
                                                <p class="title is-6">Producto <?= $detalle['descripcion'] ?> </p>
                                                <p class="title is-5">Precio <br><?= $detalle['preciounitario'] ?></p>
                                                <p class="title is-5">Cantidad <br><?= $detalle['cantidad'] ?></p>
                                                <?php
                                            }
                        ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }

                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="notification is-primary">
                    No hay compras realizadas por el cliente
                </div>
            <?php } ?>
        </div>
    </section>
<?php } else {

    return header("Location: /page_1.php");
}

?>