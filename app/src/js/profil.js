function profil() {
	$("#profil").load("html/profil.html", null, function() {
		pirateCo_donnes(pirateCo_id);
	});
}

function pirateCo_donnes(pirateCo_id) {
    $.get(url + "joueurs/" + pirateCo_id, null, afficher_donnees_pirateCo, "json");
 }

 function afficher_donnees_pirateCo(donnees) {
 	var pirateCo_niveau=donnees["NIVPIRATE"];
 	var pirateCo_pseudo=donnees["PSEUDO"];
 	var pirateCo_titre=donnees["TITRE"];

 	$("#pirateCo_niveau").html(pirateCo_niveau);
 	$("#pirateCo_pseudo").html(pirateCo_pseudo);
 	$("#pirateCo_titre").html(pirateCo_titre);
 }