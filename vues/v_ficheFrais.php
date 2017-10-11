<h3>Fiche de frais du mois de : <?php echo obtenirLibelleMois(intval(substr($mois, 4, 2))) . " " . substr($mois, 0, 4); ?>
    <em> <?php echo $infosFrais["libEtat"]; ?></em>
    depuis le <em><?php echo $infosFrais["dateModif"]; ?></em></h3>
    <div class="encadre">
        <p>Montant validé :   <?php echo $pdo->getMontant($infosForfait,$infosHorsForfait);
?>              
        </p>
        <form id="" action="index.php?uc=etatFrais&action=updateligne" method="POST">
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
                     name="q<?php echo$i?>" value="<?php echo $unLibelle["quantite"]; ?>"style="width:60%;"/></td> 

                    <?php
                    $i++;
                }
                ?>
            </tr>
        </table>
            <input type="hidden" name="id" value="<?php echo$id;?>"/>
             <input type="submit"  value="Valider"/>  <input type="reset" name="effacer" value="Effacer"/>
             
        </form>
        <table class="listeLegere">
            <caption>Descriptif des éléments hors forfait - <?php echo $infosFrais["nbJustificatifs"]; ?> justificatifs reçus -
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
                    while (count($infosHorsForfait) > $i) {
                        ?>
                <tr>
                    <td><?php echo $infosHorsForfait[$i]["date"]; ?></td>
                    <td><?php echo $infosHorsForfait[$i]["libelle"]; ?></td>
                    <td><?php echo $infosHorsForfait[$i]["montant"]; ?></td>
                    <td>Supprimer</td> 
                    <td>Reporter</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tr>

        </table>
    </div>
</div>
