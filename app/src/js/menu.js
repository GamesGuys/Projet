function menu() {
	$("nav").load("html/menu.html", null, function() {
			$("#btn_connection").hide();
            $("#btn_bateau").click(bateau);
	});
}