<?php
    if ($infosFrais["idEtat"]=="CL"){
?>
<h3>Fiche de frais du mois de : <?php echo obtenirLibelleMois(intval(substr($mois, 4, 2))) . " " . substr($mois, 0, 4); ?>
    <em> <?php echo $infosFrais["libEtat"]; ?></em>                 depuis le <em><?php echo $infosFrais["dateModif"]; ?></em></h3>
    <div class="encadre">
        <p>Montant validé :   <?php echo $montant=$pdo->getMontant($infosForfait,$_SESSION['infosHorsForfait']);  ?> </p>
        <form action="index.php?uc=etatFrais&action=updateligne" method="POST">
            
        <table class="listeLegere">
            <caption>Quantités des éléments forfaitisés</caption>
            <tr>
                <?php
                // premier parcours du tableau des frais forfaitisés du visiteur connecté
                // pour afficher la ligne des libellés des frais forfaitisés
                foreach ($infosForfait as $libelle) {
                ?>
                    <th><?php echo $libelle['libelle']; ?></th>
               <?php
                }
                ?>
            </tr>
            
            <tr>
                <?php
                // second parcours du tableau des frais forfaitisés du visiteur connecté
                // pour afficher la ligne des quantités des frais forfaitisés
                $i=0;
                foreach ($infosForfait as $unLibelle) {
                ?>
                    <td class="qteForfait"> <label for=""></label><input type="number"
                     name="<?php echo$i?>" value="<?php echo $unLibelle["quantite"]; ?>"style="width:60%;"/></td> 

                 <?php
                    $i++;
                 }
                 ?>
            </tr>
        </table>
            
            <input type="hidden" name="id" value="<?php echo$id;?>"/>
            <input type="hidden" name="mois" value="<?php echo$mois;?>"/>
            <input type="hidden" name="exist" value="1"/>
            <input type="hidden" value="<?php echo$montant?>" name="montant"/>
             <input type="submit"  value="Valider"/>  <input type="reset" name="effacer" value="Effacer"/>
        </form>
        
        <form method="post" action="index.php?uc=gererFrais&action=validerFicheFrais">
            
        <table class="listeLegere">
            <caption>Descriptif des éléments hors forfait - </label><input style="width:9%;" type="number" name="nbJust" value="<?php if (isset( $infosFrais["nbJustificatifs"])){echo $infosFrais["nbJustificatifs"];} else{echo"0";} ?>" default="0" min="0"/> justificatifs reçus -
            </caption>
            <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class="montant">Montant</th>
                <th class="montant"colspan="2"> Action</th> 
            </tr>
            
            <tr>
         <?php
         $i = 0;
         while (count($_SESSION['infosHorsForfait']) > $i) {
         ?>
                <tr<?php if($_SESSION['infosHorsForfait'][$i]["Etat"]=="Refusée"){echo ' bgcolor="#FF0000" ';}?>>
                    <td><?php echo $_SESSION['infosHorsForfait'][$i]["date"]; ?></td>
                    <td><?php if($_SESSION['infosHorsForfait'][$i]["Etat"]=="Refusée"){echo "Refusée : ";} echo $_SESSION['infosHorsForfait'][$i]["libelle"]; ?></td>
                    <td><?php echo $_SESSION['infosHorsForfait'][$i]["montant"]; ?></td>
                    <td><form method="post" action="index.php?uc=gererFrais&action=supprimerFrais"><input type="hidden" value="<?php echo$i?>" name="i"><input type="submit" value="Supprimer"/></form></td> 
                    <td><form method="post" action="index.php?uc=gererFrais&action=reporterFrais"><input type="hidden" value="<?php echo$i?>" name="i"><input type="submit" <?php if($_SESSION['infosHorsForfait'][$i]["Etat"]=="Refusée"){echo"disabled='disabled'";}?> value="Reporter"/></form></td>
                </tr>
         <?php
                $i++;
         }
         ?>
                </tr>
        </table>
            
            <input type="hidden" value="<?php echo$id?>" name="id"/>
             <input type="hidden" value="<?php echo$mois?>" name="mois"/>
             <input type="hidden" value="<?php echo$montant?>" name="montant"/>
            <input type="submit" value="Valider la fiche"/>
        </form>
    </div>
</div>
<?php
    }
    else{
        echo "<p style='background-color:red;font-family:Verdana, Arial, Helvetica, sans-serif;text-align:center;margin-top:-18px;'><i><b>Il n'existe pas de fiche clôturée à se mois.</b></i></p>";
    }
    ?>