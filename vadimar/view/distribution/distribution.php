<?php headAdmin($data); ?>

<?php headerAdmin($data); ?>

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="alert alert-primary filled-lm rounded-0 d-none" role="alert" id="area-alert-date">
				<h4 class="alert-heading rounded-0"><i class="fa fa-exclamation-triangle fa-1x" aria-hidden="true"></i> Fecha de despacho</h4>
				La fecha de despacho seleccionada es un dia domingo.
			</div>
			<div class="card p-0">
				<div class="content">
					<form>
						<div class="form-row row-eq-spacing-sm">
							<div class="col-sm-12 col-md-3 col-xl-3">
								<label for="dateDis" class="required">Fecha</label>
								<input type="date" id="dateDis" name="dateDis" class="form-control" value="<?= date("Y-m-d"); ?>"  min="<?= date('Y-m-d'); ?>">
							</div>
							<div class="col-sm-12 col-md-3 col-xl-3">
								<label for="docexDis">Doc. Ext</label>
								<input type="text" id="docexDis" name="docexDis" class="form-control" maxlength="10" placeholder="Doc. Externo">
							</div>
							<div class="col-sm-12 col-md-6 col-xl-6">
								<label for="drivDis" class="required">Conductor</label>
								<input type="hidden" name="licDis" id="licDis">
								<select name="drivDis" id="drivDis" class="select2 form-control"></select>
							</div>
						</div>
						<div class="form-row row-eq-spacing-sm">
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="transDis" class="required">Auto</label>
								<input type="hidden" id="plaDis" name="plaDis">
								<select id="transDis" name="transDis" class="select2 form-control"></select>
							</div>
							<div class="col-sm-12 col-md-3 col-xl-3">
								<label for="weiDis">Peso</label>
								<input type="number" id="weiDis" name="weiDis" class="form-control" min="0" placeholder="0" onpaste="return false">
							</div>
							<div class="col-sm-12 col-md-3 col-xl-3">
								<label for="weiDis" class="required">Ruta</label>
								<input type="hidden" name="routDis" id="routDis">
								<div id="rad-button">
								</div>
							</div>
						</div>
						<div class="form-row row-eq-spacing-sm">
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="busiDis" class="required">Raz. Soc</label>
								<input type="hidden" id="codbusDis" name="codbusDis">
								<select id="busiDis" name="busiDis" class="select2 form-control">
									<option value=""></option>
								</select>
							</div>
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="ncommDis">Nom. Com</label>
								<input type="text" id="ncommDis" name="ncommDis" class="form-control" placeholder="Nombre comercial">
							</div>
						</div>
						<div class="form-row row-eq-spacing-sm">
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="addrDis" class="required">Dirección</label>
								<input type="hidden" id="idaddrDis" name="idaddrDis">
								<select id="addrDis" name="addrDis" class="select2 form-control"></select>
							</div>
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="distDis" class="required">Distrito</label>
								<select id="distDis" name="distDis" class="select2 form-control"></select>
							</div>
						</div>
						<div class="form-row row-eq-spacing-sm">
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="persDis" class="required">Personal</label>
								<input type="hidden" name="identDis" id="identDis">
								<select id="persDis" name="persDis" class="select2"></select>
							</div>
							<div class="col-sm-12 col-md-3 col-xl-6">
								<label for="detaDis">Detalle</label>
								<textarea type="text" name="detaDis" class="form-control" id="detaDis" maxlength="100"></textarea>
							</div>
						</div>
						<div class="text-right">
							<input class="btn btn-primary" type="submit" value="Submit">
							<!--<button value="Registrar" onclick="showValue()" class="btn"></button>-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	


<?php footerAdmin($data); ?>