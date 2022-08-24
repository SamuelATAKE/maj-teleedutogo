/* :::::: CODE POUR PREVIEW DES IMAGES :::::: */
let inputExplicImg=document.querySelector("#input_image_explicative");
let imgContainer=document.querySelector("#liste_im_explic");
let boutonSupImgAperçus=[];
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