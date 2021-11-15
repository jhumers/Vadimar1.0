    <?php headAdmin($data); ?>

    <?php headerAdmin($data); ?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-xl-6">
					<div class="mw-full"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
						<div class="card p-0"> <!-- p-0 = padding: 0 -->
							<img src="https://www.wamanadventures.com/blog/wp-content/uploads/2019/07/Maravilla-Monta%C3%B1a-de-Colores-Waman-Adventures-1.jpg" class="img-fluid rounded-top" alt="..."> <!-- rounded-top = rounded corners on the top -->
							<div class="content">
								<h2 class="content-title">
									<?= $_SESSION['userData']['Code'] ?>
								</h2>
								<p class="text-muted">
									<?= $_SESSION['userData']['U_Nombres'] ?> <?= $_SESSION['userData']['U_Apellidos'] ?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-xl-6">
					<div class="mw-full">
						<div class="card p-0">
							<canvas id="canvas-barchart" height="130"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <?php footerAdmin($data); ?>

    


    