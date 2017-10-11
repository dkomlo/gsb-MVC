<h3>Fiche de frais du mois de : <?php echo obtenirLibelleMois(intval(substr($mois, 4, 2))) . " " . substr($mois, 0, 4); ?>
    <em> <?php echo $infosFrais["libEtat"]; ?></em>
    depuis le <em><?php echo $infosFrais["dateModif"]; ?></em></h3>
    <div class="encadre">
        <p>Montant validé :   <?php echo $pdo->getMontant($infosForfait,$infosHorsForfait);
?>              
        </p>
        <form id="" action=""method="POST">
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
                foreach ($infosForfait as $unLibelle) {
                    ?>
                    <td class="qteForfait"> <label for=""></label><input type="number" name="d" 
                     value="<?php echo $unLibelle["quantite"]; ?>"/></td> 

                    <?php
                }
                ?>
            </tr>
        </table>
             <input type="submit" name="valider" value="Valider"/>  <input type="reset" name="effacer" value="Effacer"/>
             
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
                    <td> du tex aaaaaaaaaaaaaaa</td> 
                    <td>hhhhhhhhhhhhhhhhh</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tr>

        </table>
    </div>
</div>
