
let form = document.querySelector("form.H_multipart_form");
let part_cycle = document.querySelector("#part_cycle");
let part_classes = document.querySelector("#part_classes");
let part_matiere = document.querySelector("#part_matiere");
let part_etablissement = document.querySelector("#part_etablissement");
let part_region = document.querySelector("#part_region");
let input_statut = document.querySelector("#statut");
let input_cycle = document.querySelector("#cycle");
let next_part_buttons = document.querySelectorAll(".bout_suivant");
let previous_part_buttons = document.querySelectorAll(".bout_precedent");


function majNumParts() {
	/**
	 * Met ajour les numéros de page
	 */
	let parts = Array.from(document.querySelectorAll("form>div"));
	let num = 1;
	parts.forEach((div)=>{
		if(!div.classList.contains("not_display")) {
			div.querySelector('.form_section_num').textContent = num;
			num++;
		}
	});
}
function makeEleveFormConfiguration() {
	/*
	* Configuration du formulaire pour le choix de role : eleve
	*/
	//On enlève les inputs non-nécessaires
	let surplus_class = Array.from(document.querySelectorAll(".classe_enseignant"));
	surplus_class.forEach((elem)=>{
		elem.classList.add('not_display');
	});
	part_cycle.classList.remove('not_display');
	part_classes.classList.remove('not_display');
	part_matiere.classList.add('not_display');
	part_etablissement.classList.remove('not_display');
	
}
function makeEnseignantFormConfiguration() {
	/*
	* Configuration du formulaire pour le choix de role : enseignant
	*/
	//On enlève les inputs non-nécessaires
	let surplus_class = Array.from(document.querySelectorAll(".classe_enseignant"));
	surplus_class.forEach((elem)=>{
		elem.classList.remove('not_display');
	});
	part_cycle.classList.remove('not_display');
	part_classes.classList.remove('not_display');
	if(input_cycle.value!='primaire') part_matiere.classList.remove('not_display'); else part_matiere.classList.add('not_display');
	part_etablissement.classList.remove('not_display');
	
}
function makeParentFormConfiguration() {
	/*
	* Configuration du formulaire pour le choix de role : parent
	*/
	//On enlève les inputs non-nécessaires
	part_cycle.classList.add('not_display');
	part_classes.classList.add('not_display');
	part_matiere.classList.add('not_display');
	part_etablissement.classList.add('not_display');
}
function makeRoleConfig() {
	let user_statut = input_statut.value;
	if(user_statut == "eleve") {
		makeEleveFormConfiguration();
	} else if(user_statut == "enseignant") {
		makeEnseignantFormConfiguration();
	} else if(user_statut == "parent") {
		makeParentFormConfiguration();
	}
	//Mise à jour des numéros de page
	majNumParts();
	//Mise à jour des matières
	addMatieres();
}
function majClasseListePrimaire(selectBalise) {
	/*
	* Configuration du formulaire pour le choix de cycle : primaire
	*/
	//vider le contenu précédent
	selectBalise.textContent="";
	//Ajout de l'option vide
	selectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_primaire.forEach((classe)=>{
		selectBalise.innerHTML += "<option value="+ classe[0] +" >"+ classe[1].toUpperCase() +"</option>";
	});
}
function majClasseListeCollege(selectBalise) {
	/*
	* Configuration du formulaire pour le choix de cycle : collège
	*/
	//vider le contenu précédent
	selectBalise.textContent="";
	//Ajout de l'option vide
	selectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_college.forEach((classe)=>{
		selectBalise.innerHTML += "<option value="+ classe[0] +" >"+ classe[1].toUpperCase() +"</option>";
	});
}
function majClasseListeLycee(selectBalise) {
	/*
	* Configuration du formulaire pour le choix de cycle : lycee
	*/
	//vider le contenu précédent
	selectBalise.textContent="";
	//Ajout de l'option vide
	selectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_lycee.forEach((classe)=>{
		selectBalise.innerHTML += "<option value="+ classe[0] +" >"+ classe[1].toUpperCase() +"</option>";
	});
}
function makeCycleConfig() {
	let user_cycle = input_cycle.value;
	let classe_select_inputs = Array.from(document.querySelectorAll("#part_classes select"));
	if(user_cycle == "1") { //Primaire
		classe_select_inputs.forEach((input)=>{
			majClasseListePrimaire(input);
		});
		part_matiere.classList.add('not_display'); //Pas de matière au primaire
	} else if(user_cycle == "2") { //Collège
		classe_select_inputs.forEach((input)=>{
			majClasseListeCollege(input);
		});
		if(input_statut.value == "enseignant")
			part_matiere.classList.remove('not_display');
		else 
			part_matiere.classList.add('not_display');
	} else if(user_cycle == "3") {//Lycée
		classe_select_inputs.forEach((input)=>{
			majClasseListeLycee(input);
		});
		if(input_statut.value == "enseignant") 
			part_matiere.classList.remove('not_display');
		else 
			part_matiere.classList.add('not_display');
	}
	//Mise à jour des numéros de page
	majNumParts();
	//Mise à jour des matières
	addMatieres();
}
function addMatieres() {
	/*
	* Ajout de la liste des matières aux selects.
	*/
	// Mise à jour des labels
	let labelsClasses = part_classes.querySelectorAll("label");
	if(input_statut.value == "eleve") {
		labelsClasses.forEach((lab)=>{
			lab.innerHTML = "Classe";
			
		});
	} else if(input_statut.value == "enseignant") {
		let i = 1
		labelsClasses.forEach((lab)=>{
			lab.innerHTML = "Classe enseignée "+i;
			i++;
		});
	}
	console.log("maj labels");
	// Ajout des matières
	let user_cycle = input_cycle.value;	
	let matSelectBalise = part_matiere.querySelectorAll("select");
	matSelectBalise.forEach((bal)=>{
		//vider le contenu précédent
		bal.textContent="";
		//Ajout de l'option vide
		bal.innerHTML += "<option value='' selected> </option>";
		//Ajouter les options
		if(user_cycle=="1") {
			matieres_primaire.forEach((mat)=>{
				bal.innerHTML += "<option value="+ mat[0] +" >"+ mat[1].toUpperCase() +"</option>";
			});
		}else if(user_cycle=="2") {
			matieres_college.forEach((mat)=>{
				bal.innerHTML += "<option value="+ mat[0] +" >"+ mat[1].toUpperCase() +"</option>";
			});
		}else if(user_cycle=="3") {
			matieres_lycee.forEach((mat)=>{
				bal.innerHTML += "<option value="+ mat[0] +" >"+ mat[1].toUpperCase() +"</option>";
			});
		}
		
	});
		
}
function initForm() {
	form.style.overflowX = "hidden";
	makeRoleConfig();
	makeCycleConfig();
	addMatieres();
}
/*
------------

------------
*/

initForm();

input_statut.addEventListener('change', (e)=>{
	makeRoleConfig();
});

input_cycle.addEventListener('change', (e)=>{
	makeCycleConfig();
});

next_part_buttons.forEach((but)=>{
	but.addEventListener('click', (e)=>{
		form.scroll(form.scrollLeft+form.scrollWidth/6, 0)
	});
});
previous_part_buttons.forEach((but)=>{
	but.addEventListener('click', (e)=>{
		form.scroll(form.scrollLeft-form.scrollWidth/6, 0)
	});
});




