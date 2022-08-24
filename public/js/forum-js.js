/* :::::: CODE POUR GERER L'AFFICHAGE DES BLOCS DE REPONSES :::::: */
// Reponse à <span class="auteur_reference font-serif">Auteur</span><p class="contenu_reference"></p>
/**
 * Fonction qui permet de mettre à jour le contenu d'un bloc de rérérence
 * grâce au lien href.
 */
function lier_id_reponse(bloc) {
    try {
        let reference = document.querySelector(bloc.getAttribute("href"));
        if (reference) {
            console.log("reference :" + reference);
            let htmlReference = "Reponse à <span class='auteur_reference font-serif'>" +
                reference.querySelector(".info_reponse>a").textContent +
                "</span><p class='contenu_reference'>" +
                reference.querySelector(".text_reponse").textContent +
                "</p>";
            bloc.innerHTML = htmlReference;
            bloc.style.display = "block";
            document.querySelector("#supprimer_reference_reponse_utilisateur").style.display = "block";
        } else {
            // console.log("Pas de reference");
            bloc.style.display = "none";
            document.querySelector("#supprimer_reference_reponse_utilisateur").style.display = "none";
        }
    } catch (e) {
        // console.log(e);
        bloc.style.display = "none";
        document.querySelector("#supprimer_reference_reponse_utilisateur").style.display = "none";
    }
}
//Première mise à jour de tous les blocs de référence
let blocsReference = Array.from(document.querySelectorAll(".bloc_reference"));
blocsReference.forEach((bloc) => { lier_id_reponse(bloc) });

/* :::::: CODE POUR GERER LES BOUTONS DE REPONSE ET DE PARTAGE :::::: */
/* :::::: CODE POUR GERER LES BOUTONS DE REPONSE ET DE PARTAGE :::::: */
/* :::::: CODE POUR GERER LES BOUTONS DE REPONSE ET DE PARTAGE :::::: */
let boutonsRepondre = document.querySelectorAll(".bouton_repondre");
let boutonsPartager = document.querySelectorAll(".bouton_partager");
let boutonSuppRef = document.querySelector("#supprimer_reference_reponse_utilisateur");
let inputMsgRef = document.querySelector("#input_msg_repondu");
//Ajout de la référence à la réponse
boutonsRepondre.forEach((bout) => {
        bout.addEventListener("click", () => {
            let idReference = bout.parentElement.parentElement.querySelector(".reponse").getAttribute("id");
            let msgARepondre = document.getElementById("message_a_repondre");
            msgARepondre.setAttribute("href", "#" + idReference);
            inputMsgRef.value = "#" + idReference;
            lier_id_reponse(msgARepondre);
        });
    })
    //Suppression de la référence
boutonSuppRef.onclick = () => {
    let lienRef = boutonSuppRef.parentElement.querySelector("a");
    lienRef.setAttribute("href", "#");
    inputMsgRef.value = "#";
    lier_id_reponse(lienRef);
};
//Clic sur le bouton partager
boutonsPartager.forEach((bout) => {
    bout.addEventListener("click", () => {
        let idReference = bout.parentElement.parentElement.querySelector(".reponse").getAttribute("id");
        let pageNativeLink = window.location.href;
        /* Car il se peut que le lien ait été modifié suite à un appuie sur un lien avec ID,
        On supprime l'id du lien courant.*/
        pageNativeLink = pageNativeLink.slice(0, pageNativeLink.indexOf("#"));
        let msgLink = pageNativeLink + "#" + idReference;
        console.log(msgLink);
        navigator.clipboard.writeText(msgLink).then(function() {
            /* presse-papiers modifié avec succès */
            alert("Le lien de la réponse a été copié dans le presse papier");
        }, function() {
            /* échec de l’écriture dans le presse-papiers */
            alert("Impossible de copier le lien du fichier");
        });
    });
});

/* :::::: CODE POUR PREVIEW DES IMAGES :::::: */
let inputExplicImg = Array.from(document.querySelectorAll(".input_image_explicative"));
//Ajout de l'image
inputExplicImg.addEventListener("change",()=>{
	//Vider le contenu précédent:
	imgContainer.innerHTML="";
	for(let i=0; i<inputExplicImg.files.length; i++)
	{
		let imgURL=window.URL.createObjectURL(inputExplicImg.files[i]);//URL vers la ressource
		imgContainer.insertAdjacentHTML('beforeend',"<div class='user_image_explic_cont'><img src="+imgURL+" alt="+i+" class='apercu_image_explicative'></div>");
	}
	imgContainer.insertAdjacentHTML('beforeend',"<div class='bouton_supprimer_image'>❌</div>");
	//Suppression des images
	boutonSupImgAperçus=document.querySelector(".bouton_supprimer_image");
	boutonSupImgAperçus.onclick=()=>{
		imgContainer.innerHTML="";
		inputExplicImg.value="";
	};
	

});
	





