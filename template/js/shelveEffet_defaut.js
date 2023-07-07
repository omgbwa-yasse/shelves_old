
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
    icone[i].addEventListener('click',function(){
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



