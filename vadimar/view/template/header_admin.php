<nav class="navbar">
	<div class="navbar-content">
		<div class="dropdown with-arrow">
			<button class="btn" data-toggle="dropdown" type="button" id="..." aria-haspopup="true" aria-expanded="false">
				Menu <i class="fa fa-angle-down ml-5" aria-hidden="true"></i> <!-- ml-5 = margin-left: 0.5rem (5px) -->
			</button>
			<div class="dropdown-menu" aria-labelledby="...">
				<a href="<?= base_url(); ?>/dashboard" class="dropdown-item <?php if($data['page_tag'] === "Dashboard"){ echo 'text-primary';}else{}?>">Inicio</a>
				<a href="<?= base_url(); ?>/distribution" class="dropdown-item <?php if($data['page_tag'] === "Distribution"){ echo 'text-primary';}else{}?>">Distribución</a>
				<a href="<?= base_url(); ?>/route" class="dropdown-item <?php if($data['page_tag'] === "Route"){ echo 'text-primary';}else{}?>">Ruta</a>
				<a href="<?= base_url(); ?>/gestor" class="dropdown-item <?php if($data['page_tag'] === "Gestor"){ echo 'text-primary';}else{}?>">Gestor</a>
			</div>
		</div>
	</div>
	<!--<a href="#" class="navbar-brand">
		<img src="<?= media(); ?>/img/logo/fake-logo.svg" alt="...">
	</a>-->
	<div class="navbar-content ml-auto">
		<button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
			<i class="fa fa-moon-o" aria-hidden="true"></i>
			<span class="sr-only">Toggle dark mode</span>
		</button>
	</div>
	<div class="dropdown with-arrow">
		<button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
			<span id="span-licence"> <?= $_SESSION['userData']['Code'] ?> </span> <i class="fa fa-angle-down ml-5" aria-hidden="true"></i>
		</button>
		<div class="dropdown-menu dropdown-menu-right" aria-labelledby="...">
			<h6 class="dropdown-header">Licencia</h6>
			<?php 
				if($_SESSION['userData']['U_LicCarro'] != ''){ echo '<a href="javascript:void(0)" class="dropdown-item" onclick="setlicenceCar()" id="licenceCarH">'. $_SESSION['userData']['U_LicCarro'] .'</a>'; }
				if($_SESSION['userData']['U_LicMoto'] != ''){ echo '<a href="javascript:void(0)" class="dropdown-item" onclick="setlicenceMot()" id="licenceMotH">'. $_SESSION['userData']['U_LicMoto'] .'</a>'; }
				else{ }
			 ?>
			<div class="dropdown-divider"></div>
			<a href="<?= base_url(); ?>/profile" class="dropdown-item <?php if($data['page_tag'] === "Profile"){ echo 'text-primary';}else{}?>">Cuenta</a>
			<a href="#" class="dropdown-item">Ajustes</a>
			<div class="dropdown-divider"></div>
			<div class="dropdown-content">
				<a href="<?= base_url(); ?>/logout" class="btn btn-sm btn-block btn-danger" type="button">Terminar</a>
			</div>
		</div>
	</div>
</nav>