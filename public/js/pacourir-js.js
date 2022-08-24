/*:::::: GESTION DE L'AFFICHAGE DES SERIES ::::::*/
let choixSeries=Array.from(document.querySelectorAll(".choix_serie"));
let blocClasses=Array.from(document.querySelectorAll(".bloc_classes"));
choixSeries.forEach((serie)=>{
	serie.addEventListener("click",()=>{
		// retrait de actif à l'ancien actif
		let ancienActif=document.querySelector(".actif");
		if(ancienActif)
			ancienActif.classList.remove("actif");
		// ajout de actif à l'élément sélectionné
		serie.classList.add("actif");
		// recherche du bloc lié à la classe
		blocClasses.forEach((bloc)=>{
			if(bloc.classList[2]==serie.classList[1]){
				bloc.style.display="flex";
			}else{
				bloc.style.display="none";
			}
		});
	});
});

/*:::::: GESTION DU SCROOL DE LA BARRE DES SERIES ::::::*/
let serieScroolGauche=document.querySelector(".content_srooler_X .scrool_before");
let serieScroolDroit=document.querySelector(".content_srooler_X .scrool_after");
let listeSerie=document.querySelector(".liste_series");
listeSerie.style.left="0";//Initiation IMPORTANTE
// Recherche de la taille du bloc de la liste des séries à scrooler
let largeurListeSerie=0;
if(listeSerie.offsetWidth){
	largeurListeSerie=listeSerie.offsetWidth;
}else if(listeSerie.style.pixelWidth){
	largeurListeSerie=listeSerie.style.pixelWidth;
}
serieScroolGauche.onclick=()=>{
	// On srool à gauche de 30px
	let blocSerieLeft=parseFloat(listeSerie.style.left);
	let newLeft=blocSerieLeft-140;
	if(newLeft<-largeurListeSerie)
	{
		//Limitation du scrool à gauche
		newLeft+=140;
	}
	listeSerie.style.left=""+newLeft+"px";
};
serieScroolDroit.onclick=()=>{
	// On srool à droite de 30px
	let blocSerieLeft=parseFloat(listeSerie.style.left);
	// console.log(listeSerie.style.left +"."+blocSerieLeft);
	let newLeft=Math.min(blocSerieLeft+140, 40);
	// On prend le min pour limiter le scrool vers la droite
	listeSerie.style.left=""+newLeft+"px";
};



