<?php
include("clases/Conexion.php");
include("files/iniciarSesion.php");
include("clases/Usuario.php");
include("clases/Funciones.php");

$funciones = new Funciones();

if(isset($_COOKIE["cDash"])){

    $hash = $_COOKIE["cDash"];

    $idUsuario = $funciones->obtenerIdUsuario($hash);

    if($idUsuario !=0 ){
        $usuario = new Usuario($idUsuario);
    }
    else{
        Header ("Location: login.html");
        exit;
    }
}
if(isset($_SESSION['usuario_id'])){
    $idUsuario = $_SESSION['usuario_id'];
    $usuario = new Usuario($idUsuario);
}

//2222
$db = new Conexion();
$menu = $db->query("SELECT * FROM productos");
// $menuInfo = $menu->fetch();

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ZAPATERIA &mdash; MAYTE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FREEHTML5.CO
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Bootstrap DateTimePicker -->
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
 
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<body>
		
	</header>
    </div>
    <div class="b-example-divider"></div>
				
				<div class="container">
      <header class="d-flex justify-content-center py-43">
				<ul class="nav nav-pills">
				<li class="nav-item"><a href="index.php" class="nav-link">Inicio</a></li>
          		<li class="nav-item"><a href="registera2.html" class="nav-link">Registrarse</a></li>
          		<li class="nav-item"><a href="login.html" class="nav-link">Cerrar sesión</a></li>
				</ul>
      </header>

<li class="nav-item dropdown no-arrow">
	<a class="nav-link dropdown-toggle" href="menu.php" id="userDropdown" role="button"
		data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<span class="mr-2 d-none d-lg-inline text-gray-800 lg"><?php echo $usuario->nombre; ?></span>
		<img class="img-profile rounded-circle"
			src="images/OIP.jpg"  
			width="80" height="80" href="menu.php">
	</a>
	<!-- Dropdown - User Information -->
	<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
		aria-labelledby="userDropdown">
		<a class="dropdown-item" href="javascript:editarUsuario(<?php echo $idUsuario; ?>)">
			<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-100"></i>
			Perfil
		</a>
		
	</div>

</li>

            <!-- Nav Item - Dashboard -->
            <?php if($usuario->tipo == 1): ?>
            <li class="nav-item active">
                <a class="nav-link" href="javascript:verUsuario()">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Usuarios registrados</span></a>
            </li>
			
            <?php  endif; ?>
            <!--para mostrar la lista de usuarios -->
            <hr class="sidebar-divider">
			<div class="row">
				<div id="informacion"></div>
			</div>
					</ul>
				</nav>
			</div>
			<!-- perfil -->
<div class="topbar-divider d-none d-sm-block"></div>

		<!-- END #fh5co-header -->
		<section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder"></h2>
						<img src="images/kk.webp" width="600" height="600">
				<?php
				echo "<br>";
				echo "<br>";
			    ?>
						<div class="btn-group" role="group" aria-label="Basic mixed styles example">
						<a class="text-decoration-none" href="producto1.php">
 						 <button type="button" class="btn btn-warning">Productos</button>
                        </a>
                    </div> 
                </div>
            </div>
        </section>

				<!-- <div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_19.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div> -->

			
				<!-- <div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_3.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_4.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_5.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_6.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_7.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_8.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_9.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_10.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_11.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_12.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_13.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_14.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_15.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_16.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_17.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_18.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_19.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div>
				<div class="fh5co-project masonry-brick">
					<a href="single.html">
						<img src="images/img_20.jpg" alt="Free HTML5 by FreeHTML5.co">
						<h2>Your Project Title Here</h2>
					</a>
				</div> -->
			</div>
			<!--END .fh5co-projects-feed-->
		</div>
	
		<!-- END .container-fluid -->

		<footer id="fh5co-footer" role="contentinfo">
			<div class="container-fluid">
				<div class="footer-content">
					<div class="copyright"><fat>&copy; 2022  <br>Realizado por <a href="http://freehtmlbh5.co/">Citlali Pat y Jazmin Eb</a></small></div>
					<div class="social">
						<a href="#"><i class="icon-facebook3"></i></a>
						<a href="#"><i class="icon-instagram2"></i></a>
						<a href="#"><i class="icon-linkedin2"></i></a>
					</div>
				</div>
			</div>
		</footer>
		<!-- END #fh5co-footer -->
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- masonry -->
	<script src="js/jquery.masonry.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

		<!-- Main -->
		<script src="js/main.js"></script>
	<script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
	<!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

	
	    <!-- Page level custom scripts -->
	<script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/validacion.js"></script>
    <script src="alertifyjs/alertify.min.js"></script>
	

	</body>
</html>

