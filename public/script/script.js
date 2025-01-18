//Btn Delete
const deleteConfirm = document.querySelectorAll("[data-name=deleteConfirm]");//selectionne les éléments ac l'attr data-name (le bouton delete) et la valeur deleteconfirm.

deleteConfirm.forEach(function(linkDelete){//boucle sur chaque element
    linkDelete.addEventListener('click', function(event){
        event.preventDefault(); //empêche le comportement par défaut de l'event, c à d rediriger le user vers une nouvelle page.
        if (confirm("Vous êtes sûr?")){ //affiche une boite de dialogue de confirmation à l'utilisateur
            location.href = linkDelete.getAttribute("href");//redirige l'utilisateur vers l'élément html en utilisant la propriété location.href
        }
        console.log(linkDelete);
    })
})

//Le menu déroulant
const hamburger = document.querySelector(".hamburger"); //sélectionne le hamburger, on le range ds une constante
const navMenu = document.querySelector(".nav-menu"); //pareil pour le menu

hamburger.addEventListener("click", ()=>{ //on écoute le clic sur le hamburger. Au clic, la fonction fléchée se déclenche
    hamburger.classList.toggle("active");//La fct ajoute la classe active au hamburger avec la méthode toggle (ajoute une classe si elle est absente, la supprime si elle est présente).
    navMenu.classList.toggle("active");//pareil pour le menu. Ouvre la navigation latérale.
})
document.querySelectorAll("nav-link").forEach(n => n.addEventListener("click", ()=> { //tous les liens de la nav sont
    hamburger.classList.remove("active");//sélectionnés pour qu'on puisse supprimer le menu si on a cliqué sur un lien
    navMenu.classList.remove("active");
}))

/*//carousel
function previous(){
    //offsetWidth: propriété qui renvoie la largeur d'un élément html.
    const widthSlider = document.querySelector(".slider").offsetWidth;
    document.querySelector(".slider-content").scrollLeft -= widthSlider;
}
function next(){
    const widthSlider = document.querySelector(".slider").offsetWidth;
    const sliderContent = document.querySelector(".slider-content");
    sliderContent.scrollLeft += widthSlider;
    const scrollLeft = document.querySelector(".slider-content").scrollLeft;
    const itemsSlider = document.querySelectorAll('.slider-content-item');
    
    //pour ramener le carousel au début
    if (scrollLeft == widthSlider * (itemsSlider.length - 1)){
        sliderContent.scrollLeft = 0;
    }
}

//Pour automatiser le carousel
setInterval("next()",4000);
*/

/*-----------------------validation de formulaire---------------------*/

let form = document.querySelector('#form-concert');

form.chDate.addEventListener('change', function(){
    validDate(this);
})

form.chTime.addEventListener('change', function(){
    validTime(this);
})

const validDate = function(inputDate){
    let dateRegExp = new RegExp(
        '^[a-zA-Z]{5,8} [0-9]{2} [a-zA-Z]{3,10} [0-9]{4}$', 'g'
        );
    let testDate = dateRegExp.test(inputDate.value);
    let small = inputDate.nextElementSibling;
    
    if(testDate){
        small.innerHTML="La date est valide";
    }
    else{
        small.innerHTML="Format invalide. Ex : Lundi 01 janvier 2001";
    }
};

const validTime = function(inputTime){
    let timeRegExp = new RegExp(
        '^[0-9]{2}[h]{1}[0-9]{2}$','g'
        );
    let testTime = timeRegExp.test(inputTime.value);
    let small = inputTime.nextElementSibling;
    if(testTime){
        small.innerHTML="L'heure est valide";
    }
    else{
        small.innerHTML="Format invalide. Ex : 08h00";
    }
    
};







































