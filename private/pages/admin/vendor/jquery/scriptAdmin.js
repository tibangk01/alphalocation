
$(function () { // verification de la validité du formualre de créaation des villes :
	$("#messageErreurIdlibCreationVille").hide();

	var ErreurIdlibCreationVille = false;

	$("#idlibCreationVille").focusout(function() {
		check_input_creation_ville();
		//alert("test");
	});

	$("#idlibCreationVille").focusout(function() {
		$("#messageErreurIdlibCreationVille").hide();
	});

	function check_input_creation_ville() {
		var libCreationVille = $("#idlibCreationVille").val();
		if ( libCreationVille == "") {
			 ErreurIdlibCreationVille = true;	
		} else {
			 ErreurIdlibCreationVille = false;
		}
	}

	$("#formIdlibCreationVille").submit(function () {
		ErreurIdlibCreationVille = false;
		check_input_creation_ville();

		if (ErreurIdlibCreationVille == false) {
			return true;
		} else {
			$("#messageErreurIdlibCreationVille").html("Veillez saisir un nom de ville.");
			$("#messageErreurIdlibCreationVille").show();
			return false;
		}
	});

	$("#formIdlibCreationVilleReset").click(function () {
		$("#messageErreurIdlibCreationVille").hide();
	});
});

// message de confirmation de création d'une ville : 

$(function () { 

	$("#btnVilleUpdated").click(function () {
		$("#villeUpdated").removeClass('d-none');
		$("#villeUpdated").html(' Modification effectuée avec succès');
		setTimeout(function () {
			$("#villeUpdated").fadeOut('slow');
		}, 1500);
	});

	$("#btnVilleCreated").click(function () {
		$("#villeCreated").removeClass('d-none');
		$("#villeCreated").html(' Ville Ajoutée avec succès');
		setTimeout(function () {
			$("#villeCreated").fadeOut('slow');
		}, 2000);
	});

	$("#btnVilleDeleted").click(function () {
		$("#villeDeleted").removeClass('d-none');
		$("#villeDeleted").html(' Ville Supprimée avec succès');
		setTimeout(function () {
			$("#villeDeleted").fadeOut('slow');
		}, 2000);
	});

	$("#btnDuplicatedFound").click(function () {
		$("#duplicatedFound").removeClass('d-none');
		$("#duplicatedFound").html(' Cette ville existe déja');
		setTimeout(function () {
			$("#duplicatedFound").fadeOut('slow');
		}, 2500);
	});

});

// ============> affichage des messages pour les types de batiment <===========
$(function () {
    $("#messageErreurIdlibCreationTB").hide();
	var ErreurIdlibCreationTB = false;

	$("#idlibCreationTB").focusout(function() {
		check_input_creation_TB();
		//alert("test");
	});

	$("#idlibCreationTB").focusin(function() {
		$("#messageErreurIdlibCreationTB").hide();
	});
	
	function check_input_creation_TB() {
		var libCreationTB = $("#idlibCreationTB").val();
		if ( libCreationTB == "") {
			 ErreurIdlibCreationTB = true;	
		} else {
			 ErreurIdlibCreationTB = false;
		}
	}

	$("#formIdlibCreationTB").submit(function () {
		ErreurIdlibCreationTB = false;
		check_input_creation_TB();

		if (ErreurIdlibCreationTB == false) {
			return true;
		} else {
			$("#messageErreurIdlibCreationTB").html("Veillez saisir un nom de type de bâtiment.");
			$("#messageErreurIdlibCreationTB").show();
			return false;
		}
	});

	$("#formIdlibCreationTBReset").click(function () {
		$("#messageErreurIdlibCreationTB").hide();
	}); 
});


$(function () { 

	$("#btnTBUpdated").click(function () {
		$("#TBUpdated").removeClass('d-none');
		$("#TBUpdated").html(' Modification effectuée avec succès');
		setTimeout(function () {
			$("#TBUpdated").fadeOut('slow');
		}, 1500);
	});

	$("#btnTBCreated").click(function () {
		$("#TBCreated").removeClass('d-none');
		$("#TBCreated").html(' Ajouté avec succès');
		setTimeout(function () {
			$("#TBCreated").fadeOut('slow');
		}, 2000);
	});

	$("#btnTBDeleted").click(function () {
		$("#TBDeleted").removeClass('d-none');
		$("#TBDeleted").html(' Supprimé avec succès');
		setTimeout(function () {
			$("#TBDeleted").fadeOut('slow');
		}, 2000);
	});

	$("#btnDuplicatedTBFound").click(function () {
		$("#duplicatedTBFound").removeClass('d-none');
		$("#duplicatedTBFound").html(' Cet élément existe déja');
		setTimeout(function () {
			$("#duplicatedTBFound").fadeOut('slow');
		}, 2500);
	});

});


// ============> affichage des messages pour les types de batiment <===========


// ============> Supperssion d'une personne <==========


$(function () { 
	$("#btnPersonneDeleted").click(function () {
		$("#personneDeleted").removeClass('d-none');
		$("#personneDeleted").html('Supperssion effectuée.');
		setTimeout(function () {
			$("#personneDeleted").fadeOut('slow');
		}, 2000);
	});
});
// ============> Supperssion d'une personne <==========