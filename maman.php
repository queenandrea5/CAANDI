<?php



/*$creneaux = [];

while(true){   
             
              
                $ouverture = (int)readline('saisir l ouverture');

                $fermeture = (int)readline('saisr la fermeture');
              if($ouverture > $fermeture){

                echo 'erreur';
              } 

              else{ $creneaux = [$ouverture,$fermeture];
                   $action=readline(`voulez vous saisir une heure d'\n ouverture (oui ou non)`);
                  
                   if($action==='non'){
                     break;
                   }
            } 

           

            print_r($creneaux);*/
    
 $mot = readline('saisir votre mot');

 $costa = strrev($mot);

 if($mot === $costa){
    return true;
 }
else{
    return false;
}



 
/*$notes = [12,14,5];

$costa = array_sum($notes);

var_dump($costa);

$papa = count($notes);

var_dump($papa);

$moyenne = ($costa/$papa);

echo ' $moyenne ';*/






