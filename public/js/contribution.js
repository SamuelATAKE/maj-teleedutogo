let classes_primaire = [
	"cp1", "cp2", "ce1", "ce2", "cm1", "cm2" 
];
let classes_college = [
	"sixieme", "cinqieme", "quatrieme", "troixieme"
];
let classes_lycee = [
	"seconde-CD", "seconde-A4", "seconde-F",
	"premiere-C", "premiere-D", "premiere-A4", "premiere-F",
	"terminal-C", "terminal-D", "terminal-A4", "terminal-F",
];
let typeInput = document.querySelector("#type");
let cycleInput = document.querySelector("#cycle");
let etablissementCaseInput = document.querySelector(".input_etablissemenent");
let anneeCaseInput  = document.querySelector(".input_annee");
let chapitreCaseInput  = document.querySelector(".input_chapitre");
let examenCaseInput  = document.querySelector(".input_examen");
let classeSelectBalise = document.querySelector("#classe");

function majInputsList(ressType) {
	/*
	* Configuration du formulaire en fonction du type de ressource
	*/
	if(ressType == "cours" || ressType == "exercice") {
		etablissementCaseInput.classList.remove("not_display");
		chapitreCaseInput.classList.remove("not_display");
		anneeCaseInput.classList.add("not_display");
		examenCaseInput.classList.add("not_display");
	}
	else if(ressType == "examen") {
		etablissementCaseInput.classList.add("not_display");
		chapitreCaseInput.classList.add("not_display");
		anneeCaseInput.classList.remove("not_display");
		examenCaseInput.classList.remove("not_display");
	}
	else if(ressType == "epreuve" || ressType == "concours") {
		etablissementCaseInput.classList.remove("not_display");
		chapitreCaseInput.classList.add("not_display");
		anneeCaseInput.classList.remove("not_display");
		examenCaseInput.classList.add("not_display");
	}
	else{
		etablissementCaseInput.classList.add("not_display");
		chapitreCaseInput.classList.add("not_display");
		anneeCaseInput.classList.add("not_display");
		examenCaseInput.classList.add("not_display");
	}
}
function majClasseListePrimaire() {
	/*
	* Configuration du formulaire pour le choix de cycle : primaire
	*/
	//vider le contenu précédent
	classeSelectBalise.textContent="";
	//Ajout de l'option vide
	classeSelectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_primaire.forEach((classe)=>{
		classeSelectBalise.innerHTML += "<option value="+ classe +" >"+ classe.toUpperCase() +"</option>";
	});
}
function majClasseListeCollege() {
	/*
	* Configuration du formulaire pour le choix de cycle : collège
	*/
	//vider le contenu précédent
	classeSelectBalise.textContent="";
	//Ajout de l'option vide
	classeSelectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_college.forEach((classe)=>{
		classeSelectBalise.innerHTML += "<option value="+ classe +" >"+ classe.toUpperCase() +"</option>";
	});
}
function majClasseListeLycee() {
	/*
	* Configuration du formulaire pour le choix de cycle : lycee
	*/
	//vider le contenu précédent
	classeSelectBalise.textContent="";
	//Ajout de l'option vide
	classeSelectBalise.innerHTML += "<option value='' selected> </option>";
	//Ajouter les options
	classes_lycee.forEach((classe)=>{
		classeSelectBalise.innerHTML += "<option value="+ classe +" >"+ classe.toUpperCase() +"</option>";
	});
}
function majClasseListe(cycleChoosed) {
	if(cycleChoosed == "primaire") {
		majClasseListePrimaire();
	}else if(cycleChoosed == "college") {
		majClasseListeCollege();
	}else if(cycleChoosed == "lycee") {
		majClasseListeLycee()
	}
}


// Initialisations
majClasseListe(cycleInput.value);
majInputsList(typeInput.value);
// Ajout des events listeners
typeInput.addEventListener("change", (e)=>{
	majInputsList(typeInput.value);
});
cycleInput.addEventListener("change", (e)=>{
	majClasseListe(cycleInput.value);
});
















