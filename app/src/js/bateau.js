function bateau() {
	$("#interface").load("html/bateau.html", null, function() {
		pirateCo_donnes(pirateCo_id);
	});
}

 function pirateCo_donnes(pirateCo_id) {
    $.get(url + "bateaux/" + pirateCo_id, null, afficher_donnees, "json");
 }

 function afficher_donnees(donnees) {
 	var bateau_nom=donnees["NOMBATEAU"];
 	var bateau_vieAct=donnees["VIEACT"];
 	var bateau_goldAct=donnees["GOLDACT"];
 	var bateau_rhumAct=donnees["RHUMACT"];
 	var bateau_nivBarre=donnees["NIVBARRE"];
 	var bateau_nivCalles=donnees["NIVCALLES"];
 	var bateau_nivCanons=donnees["NIVCANONS"];
 	var bateau_nivCoque=donnees["NIVCOQUE"];
 	var bateau_nivMat=donnees["NIVMAT"];
 	var bateau_nivPont=donnees["NIVPONT"];
 	$("#bateau_nom").html(bateau_nom);
 	$("#bateau_nom").html(bateau_nom);
    console.log(donnees);
 }