<?php
require_once '../shared/sessions.php';
require_once  '../shared/db.php';
require_once  '../shared/guard.php';
require_once  '../shared/header.php';
require_once   './carrito.php';

if ($_SESSION['user_admin'] == 'f') {

?>

    <section class="section">
        <div class="container">

            <h3 class="title">Lista Carrito</h3>
            <?php if (count($_SESSION['CARRITO']) != 0) { ?>
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth ">
                    <thead>
                        <tr>
                            <th width="40%" class="has-text-centered">Producto</th>
                            <th width="15%" class="has-text-centered">Cantidad</th>
                            <th width="20%" class="has-text-centered">Precio</th>
                            <th width="20%" class="has-text-centered">Total</th>
                            <th width="5%" class="has-text-centered">--</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $carritos = $_SESSION['CARRITO'];
                        $sumatoria = 0;
                        if ($carritos) {
                            foreach ($carritos as $carrito) {
                                $precio = $carrito['precio'];
                                $cantidad = $carrito['cantidad'];
                        ?>
                                <tr>
                                    <td width="40%" class="has-text-centered"><?php echo $carrito['nombre'] ?></td>
                                    <td width="15%" class="has-text-centered">
                                        <form method="post">
                                            <input type="hidden" id="id" name="id" value="<?php echo $carrito['id'] ?>">
                                            <button name="btnCarrito" value="Restar" class="button is-light is-small" type="submit">
                                                -</button>
                                                <?php echo $carrito['cantidad'] ?>
                                            <button name="btnCarrito" value="Sumar" class="button is-light is-small type="submit">
                                                +</button>
                                        </form>
                                        
                                    </td>
                                    <td width="20%" class="has-text-centered"> <?php echo $carrito['precio'] ?> </td>
                                    <td width="20%" class="has-text-centered"> <?php echo $precio * $cantidad ?> </td>
                                    <td width="5%">
                                        <form method="post">
                                            <input type="hidden" id="id" name="id" value="<?php echo $carrito['id'] ?>">
                                            <button name="btnCarrito" value="Eliminar" class="button is-danger" type="submit">
                                                Eliminar</button>


                                        </form>

                                    </td>
                                </tr>
                        <?php
                                $sumatoria += $precio * $cantidad;
                            }
                        }
                        ?>
                        <td colspan="3" align="right">
                            <h3>Total</h3>
                        </td>
                        <td align="right">
                            <h3> <?php echo $sumatoria ?></h3>
                        </td>

                    </tbody>
                    <tfoot>
                        <td colspan="5" >
                        <form action="pagar.php" method="post">
                        
                        <button 
                        name="btnPagar"
                        value="Pagar" 
                        class="button is-success is-large is-fullwidth is-rounded"
                        type="submit">
                        Pagar
                        </button>
                        
                        
                        </form>
                        
                        </td>
                    </tfoot>

                </table>
            <?php } else { ?>
                <div class="notification is-primary">
                    No hay productos en el carrito
                </div>
            <?php } ?>
        </div>
    </section>
<?php } else {

    return header("Location: /page_1.php");
}

?>