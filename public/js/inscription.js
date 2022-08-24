let mot_passe=document.getElementById("password");
let confirm_passe=document.getElementById("confirm_pass");
let inputs=Array.from(document.querySelectorAll("input"));
let bloc_indication=document.querySelector(".indication");
let bouton_submit=document.querySelector("#bouton_submit");
//Retrait des checkboxs de la liste des inputs
// Car on ne doit pas les prendre en compte dans les calculs
// Qui seront fait avec cette liste.
inputs.forEach((elm)=>{
	if(elm.getAttribute("type")=="checkbox")
		inputs.splice(inputs.indexOf(elm),1);
});
/**
 * Fonction qui retourne une chaine de caractère
 * Cette chaine contient un message d'erreur pour l'utilisateur
 * ou une indication
 */
function are_inputs_valid(inputs,mot_passe,confirm_passe)
{
	let indication_message="";
	//Verification de la confirmation du mot de passe
	if(mot_passe.value!=confirm_passe.value)
	{
		indication_message="*Les valeurs du mot de passe et de la confirmation du mot de passe doivent être égales";
	}
	//Vérification de la longueur du mot de passe
	if(mot_passe.value.length<6)
	{//On écrase l'ancienne valeur pour n'avoir qu'une erreur à la fois
		indication_message="*Un mot de passe sécurisé doit contenir au moins 6 caractères";
	}
	//Verification de la présensence d'élément dans chaque input
	for(input of inputs)
	{
		if(input.value.length==0)//On écrase l'ancienne valeur pour n'avoir qu'une érreur à la fois
			indication_message="*Veuillez remplir tous les champs avec des informations correctes, s'il vous plait";
	}
	return indication_message;
}

setInterval(()=>{
	let indication_message=are_inputs_valid(inputs,mot_passe,confirm_passe);
	bloc_indication.textContent=indication_message;
	if(indication_message.length<2)
	{
		bouton_submit.classList.remove("non-actif");
	}else
	{
		bouton_submit.classList.add("non-actif");
	}
},1000);

