<h3>Fiche de frais du mois de : <?php echo obtenirLibelleMois(intval(substr($mois, 4, 2))) . " " . substr($mois, 0, 4); ?>
    <em> <?php echo $infosFrais["libEtat"]; ?></em>
    depuis le <em><?php echo $infosFrais["dateModif"]; ?></em></h3>
    <div class="encadre">
        <p>Montant validé :   <?php echo $montant=$pdo->getMontant($infosForfait,$_SESSION['infosHorsForfait']); ?>              
        </p>
        <form action="index.php?uc=etatFrais&action=rembourserFicheFrais" method="POST">
            
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
                    <td class="qteForfait"> <p><?php echo $unLibelle["quantite"]; ?></p></td> 

                <?php
                    $i++;
                }
                ?>
            </tr>
        </table>
            
        <table class="listeLegere">
            <caption>Descriptif des éléments hors forfait - <?php echo $infosFrais["nbJustificatifs"]; ?> justificatifs reçus -
            </caption>
            <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class="montant">Montant</th>
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
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
            </tr>
        </table>
            
            <input type="hidden" value="<?php echo$id?>" name="id"/>
             <input type="hidden" value="<?php echo$mois?>" name="mois"/>
            <input type="submit" value="Valider le remboursement"/>
        </form>
    </div>
</div>