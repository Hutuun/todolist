function afficheMenu(obj){
	
	var idMenu     = obj.id;
	var idSousMenu = 'sous' + idMenu;
	var sousMenu   = document.getElementById(idSousMenu);
	
	if(sousMenu.style.display == "none"){
		sousMenu.style.display = "table";
	}else{
		sousMenu.style.display = "none";
	}
}

function valider(cpt) {

	document.getElementById('sub'+cpt).submit();

}
