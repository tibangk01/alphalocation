<div class="grid grid-pad">
			<div class="col-5-12">
				<div class="col-1-1"  style="padding-right: 0; margin-top: 20px;">
					<div class="content">
						<fieldset style=" margin: 0 auto;  ">
							<legend>Informations Sur Les Annonces</legend>
							<div class="col-1-1 centrer" style="padding-right: 0;">
								<div  style="width: 100%; margin: 10px auto; text-align: center;" >
									Nombre d'articles publiés : 10
								</div>
								
							</div>
							<div class="col-1-1 centrer" style="padding-right: 0;">
								<div style="border-right: 0; width: 100%; margin: 10px auto; text-align: center;">
									Nombre d'articles supprimés : 4
								</div>
								
							</div>
							<div class="col-1-1 centrer" style="padding-right: 0;">
								<div style=" width: 100%; margin: 10px auto; text-align: center;">
									<input value="Supprimer Des Annonces" type="button" onclick="location.href='pageArchivageAnnonces.php';" />
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-7-12">
				<div class="content">
					<fieldset>
						<legend>Publier Une Annonce </legend>
						<div class="col-1-1" style="text-align: center;padding-right:0;">							
							<div class="minc">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<div class="col-1-1">	
								<form action="#" method="post" class="positionCenterInput">
									<table style="margin:10px auto 10px auto;" >
										
										<tr>
											<td>Montant du loyer:</td>
											<td style="text-align: center;"><input type="text" name=""></td>
										</tr>
										<tr>
											<td>Montant de la caution:</td>
											<td style="text-align: center;"><input type="text" name=""></td>
										</tr>
										<tr>
											<td>Nom de la ville:</td>
											<td style="text-align: center;"><input type="text" name=""></td>
										</tr>
										
										<tr>
											<td>Description du logement:</td>
											<td style="text-align: center;"><textarea name="" rows="5"></textarea></td>
										</tr>
										<tr>
											<td>Type du bâtiment:</td>
											<td style="text-align: center;"><select><option value="1">Chambre simple</option>
											<option value="2">Boutique</option></select></td>
										</tr>
										<tr>
											<td>Image:</td>
											<td colspan="2" style="text-align: center;"><input type="file" value="Choisir Une Image" name="" id="imageAnn"></td>
										</tr>
										<tr>
											<td colspan="2" style="text-align: center;" ><input type="submit" value="Publier">&nbsp;<input type="reset" value="Annuler"></td>
										</tr>
									</table>
								</form>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		
	</div>