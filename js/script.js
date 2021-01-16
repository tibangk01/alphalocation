//	 alert("test !");
$(function() {
	var erreurIdConn = false;
	function verifieIdConn() {
		if ($("#idConn").val() == 'roottoor') {erreurIdConn=false;} else {erreurIdConn=true;}
	}
	var erreurPswdConn = false;
	function verifiePswdConn() {
		if ($("#pswdConn").val() == 'roottoor') {erreurPswdConn=false;} else {erreurPswdConn=true;}	
	}

	$("#formConnexionAdmin").submit(function() {
		erreurIdConn = false;
		erreurPswdConn = false;
		verifieIdConn();
		verifiePswdConn();

		if (erreurIdConn == false && erreurPswdConn == false) {
			$("#connexionError").hide();
			return true;
		} else {
			$("#connexionError").html("Erreur de connexion");
			$("#connexionError").show();
			return false;
		}
	});

	$("#adminReset").click(function () {
		$("#connexionError").hide();
	});
}); 

/* connexion de l'utilisateur*/
$("#resetErreurConnexionUser").click(function () {
		$("#erreurConnexionUser").hide();
	});
/* connexion de l'utilisateur*/
/**/
/* controle de la sais de l'utilisateur */
$(function() {
	$("#messageErreurNom").hide();
	$("#messageErreurPrenom").hide();
	$("#messageErreurTelephone").hide();
	$("#messageErreurPseudo").hide();
	$("#messageErreurMotDePasse").hide();
	$("#messageErreurMotDePasseAgain").hide();

	var erreurNom = false;
	var erreurPrenom = false;
	var erreurTelephone = false;
	var erreurPseudo = false;
	var erreurMotDePasse = false;
	var erreurMotDePasseAgain= false;

	$("#nomPers").focusout(function() {
		check_nomPers();

	});


	$("#prenomPers").focusout(function() {
		check_prenomPers();

	});

	$("#telPers").focusout(function() {
		check_telephonePers();
		
	});

	$("#pseudoPers").focusout(function() {
		check_pseudoPers();
		
	});

	$("#mdpPers").focusout(function() {
		check_motDePassePers();
		
	});

	$("#mdpPersConfirm").focusout(function() {
		check_motDePassePersConfirm();
		
	});


	function check_nomPers(){
		var pattern = /^([-a-z\sàâçèéêîôû'])+$/i; // interdire aussi les caractères spéciaux.
		var nom = $("#nomPers").val();
		if (pattern.test(nom)) {
			$("#messageErreurNom").hide();
		} else if(nom == "") {
			$("#messageErreurNom").hide();
			erreurNom = true;
		}else{
			$("#messageErreurNom").html("&nbsp;*Nom Incorrect &nbsp;");
			$("#messageErreurNom").show();
			erreurNom = true;
		}
	}

	function check_prenomPers(){
		var pattern = /^([-a-z\sàâçèéêîôû'])+$/i;
		var prenom = $("#prenomPers").val();
		if (pattern.test(prenom)) {
			$("#messageErreurPrenom").hide();
		} else if(prenom == "") {
			$("#messageErreurPrenom").hide();
			erreurPrenom = true;
		}else{
			$("#messageErreurPrenom").html("&nbsp;*Prénom Incorrect &nbsp;");
			$("#messageErreurPrenom").show();
			erreurPrenom = true;
		}
	}

	function check_telephonePers(){ 
		var pattern =/^\+?(\d\s?)+$/; // regex pour les numéros de type afrique de l'ouest.
		var telephone = $("#telPers").val();
		//var longeur_telephone = $("#telPers").val().length;
		if (pattern.test(telephone)) {
			$("#messageErreurTelephone").hide();
		} else if(telephone == ""){
			$("#messageErreurTelephone").hide();
			erreurTelephone = true;
		}
		else {
			$("#messageErreurTelephone").html("*Numéro de téléphone incorrect &nbsp;");
			$("#messageErreurTelephone").show();
			erreurTelephone = true;
		}
		
	}

	function check_pseudoPers(){
		var pattern = /^.{6,}$/;
		var pseudo = $("#pseudoPers").val();
		if (pattern.test(pseudo)) {
			$("#messageErreurPseudo").hide();
		} else if(pseudo == "") {
			$("#messageErreurPseudo").hide();
			erreurPseudo = true;
		}else{
			$("#messageErreurPseudo").html("*Mininum 6 caractères pour le pseudo&nbsp;");
			$("#messageErreurPseudo").show();
			erreurPseudo = true;
		}
	}

	function check_motDePassePers(){ 
		var mdp = $("#mdpPers").val();
		var longeur_mdp = $("#mdpPers").val().length;
		if (mdp == "") {
			$("#messageErreurMotDePasse").hide();
			erreurMotDePasse = true;
		} else if(longeur_mdp < 8) { 
			$("#messageErreurMotDePasse").html("*Minimum 8 Caractères Pour Le Mot De Passe.&nbsp;");
			$("#messageErreurMotDePasse").show();
			erreurMotDePasse = true;
		}else{
			$("#messageErreurMotDePasse").hide();
		}
	}

	function check_motDePassePersConfirm(){
		var mdp = $("#mdpPers").val();
		var mdpAgain = $("#mdpPersConfirm").val();
		if (mdpAgain == "") { 
			$("#messageErreurMotDePasseAgain").hide();
			erreurMotDePasseAgain = true;
		} else if(mdpAgain != mdp ){
			$("#messageErreurMotDePasseAgain").html("*Mots De Passes Non Conformes &nbsp;")
			$("#messageErreurMotDePasseAgain").show();
			erreurMotDePasseAgain = true;
		}else {
			$("#messageErreurMotDePasseAgain").hide();
		}
	}

	$("#formInscription").submit(function() {
	 erreurNom = false;
	 erreurPrenom = false;
	 erreurTelephone = false;
	 erreurPseudo = false;
	 erreurMotDePasseAgain= false;

	 check_nomPers();
	 check_prenomPers();
	 check_telephonePers();
	 check_pseudoPers();
	 check_pseudoPers();
	 check_motDePassePersConfirm();

	 if (erreurNom == false && erreurPrenom == false && erreurTelephone == false && erreurPseudo == false && erreurMotDePasseAgain == false) {
	 	return true;	
	 } else { 
	 	$("#messageErreurNom").hide();
	 	$("#messageErreurPrenom").hide();
	 	$("#messageErreurTelephone").hide();
	 	$("#messageErreurPseudo").hide();
	 	$("#messageErreurMotDePasse").hide();
	 	$("#messageErreurMotDePasseAgain").hide();
	 	$("#messageErreurFinal").html(" Remplissez Correctement tous les champs SVP &nbsp;")
		$("#messageErreurFinal").show();
	 	return false;
	 }

	});

	$("#formInscriptionReset").click(function () {
		$("#messageErreurNom").hide();
	 	$("#messageErreurPrenom").hide();
	 	$("#messageErreurTelephone").hide();
	 	$("#messageErreurPseudo").hide();
	 	$("#messageErreurMotDePasse").hide();
	 	$("#messageErreurMotDePasseAgain").hide();
	 	$("#messageErreurFinal").hide();
	});
});

/* controle de la sais de l'utilisateur */

/* redirection apres une inscription reussie */
$("#redirectionApresInscription").click(function() {
	var seconds = 6;
	$("#redirectionApresInscription").show();
	$("#libCount").html(seconds);
	setInterval(function() {
		seconds--
		$("#lblCount").html('&nbsp;'+seconds +'&nbsp;');
		if (seconds == 0) {
			//$("#divCountDown").hide();
			window.location = "connexion.php";
		}
	}, 1000);
});

$('#redirectionApresInscription').trigger('click');

/* redirection apres une inscription reussie */

/* disable date inscription input*/

	$("#dateInsc").prop('disabled', true);
	$("#modifNom").prop('disabled', true);
	$("#modifPrenom").prop('disabled', true);
	$("#modifSexe").prop('disabled', true);
	$("#modifPseudo").prop('disabled', true);
	$("#modifTel").prop('disabled', true);
	$("#rowInputsHide").hide();
	$("#rowConfirmMdp").hide();
	$("#rowModifSexe").hide();

$("#trigerAffichageInputsModification").click(function () {
	

	$("#dateInsc").prop('disabled', true);
	$("#modifNom").prop('disabled', false);
	$("#modifPrenom").prop('disabled', false);
	$("#modifSexe").prop('disabled', false);
	$("#modifPseudo").prop('disabled', false);
	$("#modifTel").prop('disabled', false);
	$("#rowModifSexe").show();
	$("#rowModifSexeAgain").hide();
	$("#rowConfirmMdp").show();
	$("#rowInputsHide").show();
	$("#rowButtonClickHide").hide(); 
	$("#effaceMessageErreur").hide(); 

	$(function () { // controle de la modification des informations de modification 
		$("#messageErreurModifNom").hide();
		var erreurModifNom = false;
		$("#messageErreurModifPrenom").hide();
		var erreurModifPrenom = false;
		$("#messageErreurModifPseudo").hide();
		var erreurModifPseudo = false;
		$("#messageErreurModifTel").hide();
		var erreurModifTel = false;
		
		$("#messageErreurModifMdp").hide();
		var erreurModifMdp = false;

		$("#modifNom").focusout(function () {
			check_modif_nom();
			//alert('test ! ');
		});

		$("#modifPrenom").focusout(function () {
			check_modif_prenom();
		});

		$("#modifPseudo").focusout(function () {
			check_modif_pseudo();
		});

		$("#modifTel").focusout(function () {
			check_modif_tel();
		});

		$("#confirmMdp").focusout(function () {
			check_modif_mdp();
		});


		function check_modif_nom() {
			var pattern = /^[^0-9]*$/; // interdire aussi les caractères spéciaux.
			var nom = $("#modifNom").val();
			if (nom == "") {
				$("#messageErreurModifNom").hide();
				erreurModifNom = true;
			} else if(pattern.test(nom)) {
				$("#messageErreurModifNom").hide();
			}else{
				$("#messageErreurModifNom").html("*Nom incorrect&nbsp;");
				$("#messageErreurModifNom").show();
				erreurModifNom = true;
			}
		}

		function check_modif_prenom() {
			var pattern = /^[^0-9]*$/; // interdire aussi les caractères spéciaux.
			var prenom = $("#modifPrenom").val();
			if (prenom == "") {
				$("#messageErreurModifPrenom").hide();
				erreurModifPrenom = true;
			} else if(pattern.test(prenom)) {
				$("#messageErreurModifPrenom").hide();
			}else{
				$("#messageErreurModifPrenom").html("*Prenom incorrect&nbsp;");
				$("#messageErreurModifPrenom").show();
				//alert("erreur ");
				erreurModifPrenom = true;
			}
		}

		function check_modif_pseudo() { 
			var pattern = /^.{6,}$/;
			var pseudo = $("#modifPseudo").val();
			if (pattern.test(pseudo)) {
				$("#messageErreurModifPseudo").hide();
			} else if(pseudo == "") {
				$("#messageErreurModifPseudo").hide();
				erreurModifPseudo = true;
			}else{
				$("#messageErreurModifPseudo").html("*Mininum 6 caractères pour le pseudo&nbsp;");
				$("#messageErreurModifPseudo").show();
				erreurModifPseudo = true;
			}
		}

		function check_modif_tel() {
			var pattern = /^\+?(\d\s?)+$/; // regex pour les numéros de type afrique de l'ouest.
			var telephone = $("#modifTel").val();
			//var longeur_telephone = $("#telPers").val().length;
			if (pattern.test(telephone)) {
				$("#messageErreurModifTel").hide();
			} else if(telephone == ""){
				$("#messageErreurModifTel").hide();
				erreurModifTel = true;
			}
			else {
				$("#messageErreurModifTel").html("*Numéro Incorrect(format : +xxx xx xx xx xx)&nbsp;");
				$("#messageErreurModifTel").show();
				erreurModifTel = true;
			}
		}

		function check_modif_mdp() {
			var mdp = $("#confirmMdp").val();
			var longeur_mdp = $("#confirmMdp").val().length;
			if (mdp == "") {
				$("#messageErreurModifMdp").hide();
				erreurModifMdp = true;
			} else if(longeur_mdp < 8) { 
				$("#messageErreurModifMdp").html("*Minimum 8 Caractères Pour Le Mot De Passe.&nbsp;");
				$("#messageErreurModifMdp").show();
				erreurModifMdp = true;
			}else{
				$("#messageErreurModifMdp").hide();
			}
		}


			$("#idMimc").submit(function() {
				erreurModifNom = false;
				erreurModifPrenom = false;
				erreurModifPseudo = false;
				erreurModifTel = false;
				erreurModifMdp = false;
		
				check_modif_nom();
				check_modif_prenom();
				check_modif_pseudo();
				check_modif_tel();
				check_modif_mdp();

				if (erreurModifNom == false && erreurModifPrenom == false && erreurModifPseudo == false && erreurModifTel == false && erreurModifMdp == false) {
					return true;
				} else {
					$("#messageErreurModifNom").hide();
					$("#messageErreurModifPrenom").hide();
					$("#messageErreurModifPseudo").hide();
					$("#messageErreurModifTel").hide();
					$("#messageErreurModifMdp").hide();
					$("#messageErreurModifGeneral").html(" Remplissez Correctement tous les champs SVP &nbsp;");
					$("#messageErreurModifGeneral").show();
					return false;
				}
			});

			$("#hideAllWithoutModification").click(function() {
				$("#messageErreurModifNom").hide();
				$("#messageErreurModifPrenom").hide();
				$("#messageErreurModifPseudo").hide();
				$("#messageErreurModifTel").hide();
				$("#messageErreurModifMdp").hide();
				$("#messageErreurModifGeneral").hide();

				$("#dateInsc").prop('disabled', true);
				$("#modifNom").prop('disabled', true);
				$("#modifPrenom").prop('disabled', true);
				$("#modifSexe").prop('disabled', true);
				$("#modifPseudo").prop('disabled', true);
				$("#modifTel").prop('disabled', true);

				$("#rowModifSexe").hide();
				$("#rowModifSexeAgain").show();
				$("#rowConfirmMdp").hide();
				$("#rowInputsHide").hide();
				$("#rowButtonClickHide").show(); 

			}); 
		});
	});

/* disable date inscription input*/

/*redirection en cas d'erreur lors de a modification des informations */

$("#redirectionApresErreurModification").click(function() {
	var seconds = 6;
	$("#redirectionApresErreurModification").show();
	$("#lblCountErreurModif").html(seconds);
	setInterval(function() {
		seconds--
		$("#lblCountErreurModif").html('&nbsp;'+seconds +'&nbsp;');
		if (seconds == 0) {
			
			window.location = "monCompte.php";
		}
	}, 1000);
});

$('#redirectionApresErreurModification').trigger('click');


/*redirection en cas d'erreur lors de a modification des informations */


/*redirection en cas d'erreur lors de a modification des informations */

$("#redirectionApresSuccessModification").click(function() {
	var seconds = 4;
	$("#redirectionApresSuccessModification").show();
	$("#lblCountSuccessModif").html(seconds);
	setInterval(function() {
		seconds--
		$("#lblCountSuccessModif").html('&nbsp;'+seconds +'&nbsp;');
		if (seconds == 0) {
			
			window.location = "monCompte.php";
		}
	}, 1000);
});

$('#redirectionApresSuccessModification').trigger('click');


/*redirection en cas d'erreur lors de a modification des informations */


/*
* <========= Contrôle des infromations pour la publication des annonces  de location =======>
*/

$(function () {

	$("#messageErreurMessageDescription").hide();
	$("#messageErreurLoyer").hide();
	$("#messageErreurCaution").hide();
	$("#messageErreurville").hide();
	$("#messageErreurTypeLogement").hide();
	$("#messageErreurImages").hide();
	$("#messageErreurGeneralPublication").hide(); 

	$("#idDescAnn, #idLoyerAnn, #idCautionAnn, #idVilleAnn, #idTypeLogementAnn, #idImageAnn ").focusin(function() {
		$("#messageErreurGeneralPublication").hide();
	});

	var erreurDescription = false;
	var erreurLoyer = false;
	var erreurCaution = false;
	var erreurVille = false;
	var erreurTypeLogement = false;
	var erreurImage = false;
	var erreurGeneralPublication = false;

	$("#idDescAnn").focusout(function() {
		 check_descAnn();

	});


	$("#idLoyerAnn").focusout(function() {
		check_loyerAnn();
		//alert("test");
	});

	$("#idCautionAnn").focusout(function() {
		check_cautionAnn();
	});


	$("#idVilleAnn").focusout(function() {
		check_villeAnn();
	});


	$("#idTypeLogementAnn").focusout(function() {
		check_typeLogementAnn();
	});


	$("#idImageAnn").focusout(function() {
		check_imageAnn();
	}); 

	function check_descAnn() {
		var longueurDesc= $("#idDescAnn").val().length;
		if (longueurDesc == 0 ) {
			erreurDescription = true;
			$("#messageErreurMessageDescription").hide();
		} else if ( longueurDesc <= 100) {
			erreurDescription = false;
			$("#messageErreurMessageDescription").hide();
		} else {
			erreurDescription = true;
			$("#messageErreurMessageDescription").html("&nbsp;*Message trop long");
			$("#messageErreurMessageDescription").show();
		}
	}
	function check_loyerAnn() {
		var pattern =  /^[0-9.]+$/;
		var loyer = $("#idLoyerAnn").val();
		if (pattern.test(loyer) && (loyer > 0 )) {
			$("#messageErreurLoyer").hide();
			erreurLoyer = false;
		} else if ( loyer =="") {
			erreurLoyer = true;
			$("#messageErreurLoyer").hide();
		} else {
			erreurLoyer = true;
			$("#messageErreurLoyer").html("&nbsp;*Entrez un montant de loyer valide"); 
			$("#messageErreurLoyer").show(); 
		}
	} 

	function check_cautionAnn() {
		var pattern =  /^[0-9]+$/;
		var Caution = $("#idCautionAnn").val();
		if (pattern.test(Caution) && (Caution > 0 )) {
			$("#messageErreurCaution").hide();
			erreurCaution = false;
		} else if ( Caution =="") {
			erreurCaution = true;
			$("#messageErreurCaution").hide();
		} else {
			erreurCaution = true;
			$("#messageErreurCaution").html("&nbsp;*Entrez un montant de Caution valide"); 
			$("#messageErreurCaution").show(); 
		}
	} 

	function check_villeAnn() {
		var libelleVille = $("#idVilleAnn").val();
		if (libelleVille ==0) {
			erreurVille = true;
		//	$("#messageErreurville").html("&nbsp;*Choisissez une ville SVP");
			$("#messageErreurville").hide();
		} else {
			erreurVille = false;
			$("#messageErreurville").hide();
		}
	}

	function check_typeLogementAnn() {
		var libelleTypeLogement = $("#idTypeLogementAnn").val();
		if (libelleTypeLogement == 0) {
			erreurTypeLogement = true;
			$("#messageErreurTypeLogement").hide();
		} else {
			erreurTypeLogement = false;
			$("#messageErreurTypeLogement").hide();
		}
	} 

	function check_imageAnn() {
		$("#idImageAnn").on("change",function() {
			var tabImage = $("#idImageAnn");
			var longeurTabImage = tabImage[0].files.length;
			var entite = tabImage[0].files;
			if (longeurTabImage > 0 ) {
				for (var i = 0; i < longeurTabImage; i++) { 
					var nomImage = entite[i].name;
					var poidsImage = entite[i].size;
					var extension = nomImage.replace(/^.*\./, '');
					if (extension == nomImage) {
						extension = "";
					}else{
						extension = extension.toLowerCase();
					}
					if ((extension == 'jpg' || extension == 'jpeg' || extension == 'png') && (poidsImage  <3145728)) { // poids inférieur à 3 mo.
						erreurImage = false;
						$("#messageErreurImages").hide();
					} else {
						erreurImage = true;
						$("#messageErreurImages").html("&nbsp;*Seuls les fichiers de type png, jpg, jpeg avec des poids inférieurs à 3mo sont autorisés.");
						$("#messageErreurImages").show();
						return false;
					}
				}		 
			}
		});
	};


	/*
	* <========== blocage et deblocage du formulaire ==========>
	*/

	$("#formPubAnnonce").submit(function() { 
		erreurDescription = false;
		erreurLoyer = false;
		erreurCaution = false;
		erreurVille = false;
		erreurTailleImage = false;
		erreurTypeImage = false;
		erreurTypeLogement = false;
		erreurGeneralPublication = false;
		
		check_descAnn();
		check_loyerAnn();
		check_cautionAnn();
		check_villeAnn();
		check_typeLogementAnn();
		check_imageAnn(); 

		 if (erreurDescription == false && erreurLoyer == false && erreurCaution == false && erreurVille == false && erreurTypeLogement == false && erreurImage == false) {
		 	$("#messageErreurGeneralPublication").hide();
		 	return true;
		 } else { 
		 	$("#messageErreurMessageDescription").hide();
			$("#messageErreurLoyer").hide();
			$("#messageErreurCaution").hide();
			$("#messageErreurville").hide();
			$("#messageErreurImages").hide();
			$("#messageErreurGeneralPublication").html("Merci de remplir correctement tout le formulaire avant soumission.");	
			$("#messageErreurGeneralPublication").show();
		 	return false; 
		 }	
	});

	/*
	* <========== blocage et deblocage du formulaire ==========>
	*/

	/*
	* <========== purge du formulaire ==========>
	*/
	$("#resetformPubAnnonce").click(function () {
		$("#messageErreurMessageDescription").hide();
		$("#messageErreurLoyer").hide();
		$("#messageErreurCaution").hide();
		$("#messageErreurville").hide();
		$("#messageErreurTypeLogement").hide();
		$("#messageErreurImages").hide();
		$("#messageErreurGeneralPublication").hide();
	});
	/*
	* <========== purge du formulaire ==========>
	*/
});


/*
* <========= Contrôle des infromations pour la publication des annonces  de location =======>
*/





