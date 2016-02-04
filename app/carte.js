function carte() {
	$("#interface").load("html/carte.html", null, function() {
		carte_donnees(pirateCo_id);
	});
}

 function carte_donnees(pirateCo_id) {
 	//var url2="http://vsp149406.nfrance.com/~16_machu/pirate/src/php";
    $.get(url + "joueurs", null, afficher_piratesProches, "json");
	$.get(url + "coffres", null, afficher_coffresProches, "json");
	$.get(url + "lcs", null, afficher_lcsProches, "json");
 }

 //PIRATE PROCHES
 function afficher_piratesProches(donnees) {
 	for (var i = 0; i < 4; i++) {
 		var pirate_niv=donnees[i]['NIVPIRATE'];
 		var pirate_pseudo=donnees[i]['PSEUDO'];
 		var pirate_id=donnees[i]['IDPIRATE'];
 		var res='<tr><td class="table_sousTitre">'+pirate_niv+'</td><td class="table_valeur">'+pirate_pseudo+'</td><td><button class="btn_attaquer" id="attaquer_'+pirate_id+'">Attaquer</button></td></tr>';
		$("#carte_piratesProches").append(res);
	}
}

//COFFRES PROCHES
function afficher_coffresProches(donnees) {
 	for (var i = 0; i < 2; i++) {
 		var coffre_idPirate=donnees[i]['IDPIRATE'];
		var coffre_id=donnees[i]['IDCOFFRE'];
		$.get(url + "joueurs/"+coffre_idPirate, ajouter_btnId(coffre_id), afficher_coffre_joueurs, "json");	
	}
}

function afficher_coffre_joueurs(donnees){
	var pirate_pseudo=donnees['PSEUDO'];
	var pirate_idClan=donnees['IDCLAN'];
 	var res='<tr><td class="table_valeur">'+pirate_pseudo+'</td>';
	$("#carte_coffresProches").append(res);
}

function ajouter_btnId(id){
	var res='<td><button class="btn_ramasser" id="ramasser_'+id+'">Ramasser</button></td></tr>';
	$("#carte_coffresProches").append(res);
}

//LIEUX CONQUETES PROCHES
function afficher_lcsProches(donnees) {
 	for (var i = 0; i < 2; i++) {
 		var lc_idClan=donnees[i]['IDCLAN'];
		var lc_id=donnees[i]['IDLC'];
		$.get(url + "clans/"+lc_idClan, null, afficher_infos_lc, "json");
	}
}

function afficher_infos_lc(donnees){
	var clan_nom=donnees['NOMCLAN'];
 	var clan_id=donnees['IDCLAN'];
 	var res='<tr><td class="table_sousTitre">'+clan_nom+'</td><td><button class="btn_attaquer" id="attaquer_'+clan_id+'">Attaquer</button></td></tr>';
	$("#carte_LCProches").append(res);
}
 	