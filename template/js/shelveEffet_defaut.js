var services = document.querySelectorAll('.service');
var subService = document.querySelectorAll('.subService');
var serviceStatus = true;
for (let index = 0; index < services.length; index++) {
    services[index].addEventListener('click', function(){
      if(serviceStatus){
        subService[index].style.display = "none";
        serviceStatus = false;
      }else{
        subService[index].style.display = "block";
        serviceStatus = true;
      }
    });
};

/* Navigation des bouton des sous menus */ 
var tab = document.querySelectorAll(".btnSousMenu");
var tabOption = document.querySelectorAll(".optionSousMenu");
var tabOptionStatus = true;

for (let index = 0; index < tab.length; index++) {
    tab[index].addEventListener('click', function(){
        if(tabOptionStatus){
            tabOption[index].style.display = "none";
            tabOptionStatus = false;
        }else{
            tabOption[index].style.display = "block";
            tabOptionStatus = true;
        }
    });
};



/* Affichage des fiches descriptives */ 
var record = document.querySelectorAll(".records");
var icone = document.querySelectorAll(".iconePlusMoins");
var displayStatut = false;

for (let i=0; i <= icone.length; i++){
    icone[i].addEventListener('click', function(){
        if(displayStatut){
            record[i].style.display = "block";
            icone[i].src = 'template/images/moins.png';
            displayStatut = false;
        } else{
            record[i].style.display = "none";
            icone[i].src = 'template/images/plus.png';
            displayStatut = true;
        }
            
    });
};

/* Navigation */






/* Option chariot d'enregistrements */ 





  
/*   Gestion des dates de validation */






/*   Ajoute des champs */

var nomInput = document.getElementById('author');
var ajouterBtn = document.getElementById('addAuthor');
var auteursDiv = document.getElementById('authors');

let nbAuteurs = 1;

ajouterBtn.addEventListener('click', () => {
  nbAuteurs++;

  // Créer un nouvel élément pour l'auteur
  var auteurEl = document.createElement('div');
  auteurEl.classList.add('auteur');

  // Créer un champ pour le nom de l'auteur
  var nomInput = document.createElement('input');
  nomInput.type = 'text';
  nomInput.name = `author${nbAuteurs}`;
  nomInput.required = true;

  // Créer un label pour le champ
  var nomLabel = document.createElement('label');
  nomLabel.for = nomInput.name;
  nomLabel.textContent = `Producteur n° ${nbAuteurs} :`;

  // Ajouter le label et le champ à l'élément auteur
  auteurEl.appendChild(nomLabel);
  auteurEl.appendChild(nomInput);

  // Ajouter l'élément auteur à la div
  auteursDiv.appendChild(auteurEl);
});



