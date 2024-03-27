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


const nomInput = document.getElementById('authors');
const ajouterBtn = document.getElementById('ajouter');
const auteursDiv = document.getElementById('auteurs');

let nbAuteurs = 0;

ajouterBtn.addEventListener('click', () => {
  nbAuteurs++;

  // Créer un nouvel élément pour l'auteur
  const auteurEl = document.createElement('div');
  auteurEl.classList.add('auteur');

  // Créer un champ pour le nom de l'auteur
  const nomInput = document.createElement('input');
  nomInput.type = 'text';
  nomInput.name = `nom${nbAuteurs}`;
  nomInput.required = true;

  // Créer un label pour le champ
  const nomLabel = document.createElement('label');
  nomLabel.for = nomInput.name;
  nomLabel.textContent = `Nom de l'auteur ${nbAuteurs} :`;

  // Ajouter le label et le champ à l'élément auteur
  auteurEl.appendChild(nomLabel);
  auteurEl.appendChild(nomInput);

  // Ajouter l'élément auteur à la div
  auteursDiv.appendChild(auteurEl);
});

