<?php 
    if(isset($_SESSION["rol"])){
        if($_SESSION["rol"] == "Administrador"){
?>
    <ul>
        <li class="dropdown">
            <a href="gestionEmp.php" class="dropbtn">Gestión de empleados</a>
            <div class="dropdown-content">
                <a href="agregarEmp.php">Agregar empleados</a>
                <a href="consultarEmp.php">Consultar empleados</a>
                <a href="actualizarEmp.php">Actualizar empleados</a>
                <a href="eliminarEmp.php">Eliminar empleados</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="gestionComp.php" class="dropbtn">Gestión de componentes</a>
            <div class="dropdown-content">
                <a href="agregarComp.php">Agregar componentes</a>
                <a href="consultarComp.php">Consultar componentes</a>
                <a href="actualizarComp.php">Actualizar componentes</a>
                <a href="eliminarComp.php">Eliminar componentes</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="gestionProv.php" class="dropbtn">Gestión de proveedores</a>
            <div class="dropdown-content">
                <a href="agregarProv.php">Agregar proveedores</a>
                <a href="consultarProv.php">Consultar proveedores</a>
                <a href="actualizarProv.php">Actualizar prooveedores</a>
                <a href="eliminarProv.php">Eliminar proveedores</a>
            </div>
        </li>
        <li><a href="informeGen.php">Informe General</a></li>
        <li><a href="logout.php">Cerrar Sesión</a></li>
    </ul>
<?php 
        }

        if($_SESSION["rol"] == "Usuario de ventas"){
?>
            <ul>
                <li class="dropdown">
                    <a href="gestionVen.php" class="dropbtn">Gestión de ventas</a>
                    <div class="dropdown-content">
                        <a href="agregarVen.php">Registro de ventas</a>
                        <a href="consultarVen.php">Consulta de ventas</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="gestionPed.php" class="dropbtn">Gestión de pedidos</a>
                    <div class="dropdown-content">
                        <a href="agregarPed.php">Registro de pedidos</a>
                        <a href="consultarPed.php">Consulta de pedidos</a>
                    </div>
                </li>
                <li><a href="consultarInven.php">Consulta de inventario</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
<?php   }

        if($_SESSION["rol"] == "Técnico"){
?>
            <ul>
                <li><a href="consultarVenTec.php">Gestión de ventas</a></li>
                <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
<?php
        }
        
        if($_SESSION["rol"] == "Cliente"){
?>
            <ul>
                <li><a href="catalogo.php">Catálogo</a></li>
                <li><a href="carrito.php">Carrito de compras</a></li>
                <li><a href="pagos.php">Métodos de pago</a></li>
                <li><a href="segPedido.php">Pedidos</a></li>
                <li class="dropdown">
                    <a class="dropbtn">Mi cuenta</a>
                    <div class="dropdown-content">
                        <a href="perfil.php">Perfil</a>
                        <a href="logout.php">Cerrar Sesión</a>
                    </div>
                </li>
            </ul>
<?php
        }
    }else{?>
<ul>
    <li><a href="catalogo.php">Catálogo</a></li>
    <li><a href="carrito.php">Carrito de compras</a></li>
    <li class="dropdown">
        <a class="dropbtn">Mi cuenta</a>
        <div class="dropdown-content">
             <a href="crearCuenta.php">Creación de cuenta</a>
             <a href="index.php">Iniciar Sesión</a>
        </div>
    </li>
</ul>
<?php } ?>