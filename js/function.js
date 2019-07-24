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

function CocheTout(name) {
	var elements = document.getElementsByClassName('inf');

	for (var i = 0; i < elements.length; i++) {
		if (elements[i].type == 'checkbox' && elements[i].name != name) {
			elements[i].checked = false;
		}
		if(elements[i].type == 'text' && elements[i].name != name){
			elements[i].value = "";
		}
	}
}


