/*::::::::: CODE ANNIMATION BANNIERE ::::::::::*/
postersAnimes=document.querySelectorAll(".banniere-poster");
let i=1;
setInterval(()=>
{
	let u=(i+1)%3;
	postersAnimes[i].classList.remove("center-poster");
	postersAnimes[i].classList.add(postersAnimes[u].classList[1]);
	postersAnimes[u].classList.remove(postersAnimes[i].classList[1]);
	postersAnimes[u].classList.add("center-poster");
	i=(i+1)%3;

},8000);
/*::::::::: CODE POUR GERER LE CHOIX DU STATUT(Elève Enseignant Parent d'élève)::::::::::*/
let choix_statut=Array.from(document.querySelectorAll(".choix-statut"));
choix_statut.forEach((element)=>
{
	element.addEventListener("click",()=>
	{
		//Retirer la classe actif à l'actif précédent et réaffecter l'actif
		choix_statut.forEach((elm)=>{
			elm.classList.remove("actif");
		});
		element.classList.add("actif");
		//Modification de la class du body pour changer le contenu.
		let body=document.querySelector("body");
		//Retrais de la class non active
		body.classList.remove("affichage-eleve");
		body.classList.remove("affichage-parent");
		body.classList.remove("affichage-enseignant");
		//ajout de la classe active
		switch(choix_statut.indexOf(element))
		{
			case 0:
				body.classList.add("affichage-parent");
				break;
			case 1:
				body.classList.add("affichage-eleve");
				break;
			case 2:
				body.classList.add("affichage-enseignant");
				break;
			default:
				console.log("Index error. Problème de changement de statut.");
		}
	})
});


