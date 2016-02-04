function bateau() {
	$("#interface").load("html/bateau.html", null, function() {
		bateau_donnes(pirateCo_id);
    $(".btn_ameliorer").click(ameliorerBatiment);
	});
}

 function bateau_donnes(pirateCo_id) {
    $.get(url + "bateaux/" + pirateCo_id, null, afficher_donnees_bateau, "json");
    $.get(url + "joueurs/" + pirateCo_id, null, recupere_idClan, "json");
 }

 function afficher_donnees_bateau(donnees) {
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

 	$("#nivBarre").html("niveau "+bateau_nivBarre);
 	$("#nivCalles").html("niveau "+bateau_nivCalles);
 	$("#nivCanons").html("niveau "+bateau_nivCanons);
 	$("#nivCoque").html("niveau "+bateau_nivCoque);
 	$("#nivMat").html("niveau "+bateau_nivMat);
 	$("#nivPont").html("niveau "+bateau_nivPont);

 	var bateau_vieMax=calculerVieMax(bateau_nivCoque,bateau_nivPont);
 	$("#bateau_vie").html(bateau_vieAct+"/"+bateau_vieMax);

 	var bateau_degats=calculerDegats(bateau_nivCanons,bateau_nivPont);
 	$("#bateau_degats").html(bateau_degats);

 	var bateau_esquive=calculerEsquive(bateau_nivBarre);
 	$("#bateau_esquive").html(bateau_esquive+"%");

 	var bateau_rhumMax=calculerRhumMax(bateau_nivCalles);
 	$("#bateau_rhum").html(bateau_rhumAct+"/"+bateau_rhumMax);

 	var bateau_goldMax=calculerGoldMax(bateau_nivCalles);
 	$("#bateau_or").html(bateau_goldAct+"/"+bateau_goldMax);

  var bateau_vision=calculerVision(bateau_nivMat);
  $("#bateau_vision").html(bateau_vision);
 }

 function recupere_idClan(donnees){
  var pirateCo_idClan=donnees["IDCLAN"];
  $.get(url + "clans/" + pirateCo_idClan, null, afficher_nomClan_pirateCo, "json");
 }

 function afficher_nomClan_pirateCo(donnees){
  var pirateCo_nomClan=donnees["NOMCLAN"];
  $("#pirateCo_clan").html(pirateCo_nomClan);
 }

 function calculerVieMax(nivCoque,nivPont){
 	var vieMax=nivCoque*nivCoque+995+nivPont*4;
 	return vieMax;
 }

  function calculerDegats(nivCanons,nivPont){
  	var degats=nivCanons*nivCanons+95+nivPont*4;
  	return degats;
 }

  function calculerEsquive(nivBarre){
  	var esquive=nivBarre*0.15;
  	return esquive;
 }

  function calculerRhumMax(nivCalles){
  	var rhumMax=nivCalles*4.5+495.5;
  	return rhumMax;
 }

  function calculerGoldMax(nivCalles){
  	var goldMax=nivCalles*4.5+495.5;
  	return goldMax;
 }

 function calculerVision(nivMat){
  var vision=nivMat*nivMat+225+nivMat*4;
  return vision;
 }

 function ameliorerBatiment(evt){
  var batiment=event.target.id;
    var data = '{ "'+batiment+'" : 46}';
    $.ajax({
        method: "PUT",
        url: url+"bateaux/"+pirateCo_id,
        data: data,
        dataType: 'json',
        success: function(data){
          console.log("ok -> "+ JSON.stringify(data));
        }
      });
  bateau();
 }

