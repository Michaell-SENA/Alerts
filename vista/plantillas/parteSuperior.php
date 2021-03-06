<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../assets/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../assets/css/pagina_admin.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/pagina_alerta_temprana.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/pagina_registros.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav barra sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../datos/admin.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="sidebar-brand-text mx-3">

                    <strong>Bienvenido: </strong><?php echo $_SESSION['nombres']; ?>

                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../datos/admin.php">
                    <i class="fas fa-house-user"></i>
                    <span>Inicio</span></a>
            </li>

            <div class="sidebar-heading">
                SEGUIMIENTO
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../vista/registros.php?nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-id-badge"></i>
                <span>REGISTROS</span></a>
            </li>

            <!-- Heading -->
            <div class="sidebar-heading">
                GESTION
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../datos/alerta_temprana.php">
                    <i class="fas fa-user-plus"></i>
                <span>ALERTA TEMPRANA</span></a>
            </li>

            <?php if ($_SESSION['cargo'] == 1) 
                {


                $crg = $_SESSION['cargo'];
                $crg = password_hash($crg, PASSWORD_DEFAULT);
                
            ?>
            


            <li class="nav-item">
                <a class="nav-link" href="../vista/casos_asignados.php?id=<?php echo $_SESSION['id']?>&nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-address-book"></i>
                <span>CASOS ASIGNADOS</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../datos/herramienta_citas/index.php?for=<?php echo $_SESSION['nombres']; ?>&factor=<?php echo $crg ?>">
                    <i class="fas fa-address-book"></i>
                <span>AGENDA</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../vista/caso_reportado.php?id=<?php echo $_SESSION['id']?>&nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-address-book"></i>
                <span>CASOS REGISTRADOS</span></a>
            </li>

            <div class="sidebar-heading">
                SEMAFORO
            </div>

            <li class="nav-item" id="color-1">
                <a class="nav-link" href="../vista/verde.php?nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-exclamation-triangle"></i>
                <span>VERDE</span></a>
            </li>

            <li class="nav-item" id="color-2">
                <a class="nav-link" href="../vista/naranja.php?nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-exclamation-triangle"></i>
                <span>NARANJA</span></a>
            </li>

            <li class="nav-item" id="color-3">
                <a class="nav-link" href="../vista/rojo.php?nombre=<?php echo $_SESSION['nombres']; ?>&pagina=1">
                    <i class="fas fa-exclamation-triangle"></i>
                <span>ROJO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <?php 
                }
            ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block">
                            
                        </div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a id="btn" href="../datos/cerrarSesion.php" class="btn btnn btn-lg col-md-12">Cerrar Sesion</a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->