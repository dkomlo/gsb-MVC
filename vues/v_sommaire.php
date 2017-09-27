    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
<?php
if($_SESSION['type']=="visiteur"){
?>
      </div>  
        <ul id="menuList">
			<li >
                                                                          Visiteur :
                                                                          <b><h3><?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?></h3></b><br>
			</li>
           <li class="smenu">
              <a href="index.php?uc=gererFrais&action=saisirFrais" title="Saisie fiche de frais ">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
<?php 
} 
if($_SESSION['type']=="comptable"){
?>
      </div>  
        <ul id="menuList">
			<li >
                                                                          Comptable :
                                                                          <b><h3><?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?></h3></b>
			</li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=validerFicheFrais" title="Saisie fiche de frais ">Valider les fiches de frais</a>
           </li>
           <li class="smenu">
              <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Suivi des fiches de frais</a>
           </li>
 	   <li class="smenu">
              <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
           </li>
         </ul>
        
    </div>
<?php
}
?>