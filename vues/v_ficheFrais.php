 <h3>Fiche de frais du mois de : <?php echo obtenirLibelleMois(intval(substr($mois,4,2))) . " " . substr($mois,0,4); ?>
    <em> <?php echo $infosFrais["libEtat"]; ?></em>
    depuis le <em><?php echo $infosFrais["dateModif"]; ?></em></h3>
    <div class="encadre">
    <p>Montant validé :   <?php echo $infosFrais["montantValide"] ;
        ?>              
    </p>
  	<table class="listeLegere">
  	   <caption>Quantités des éléments forfaitisés</caption>
        <tr>
            <?php
            // premier parcours du tableau des frais forfaitisés du visiteur connecté
            // pour afficher la ligne des libellés des frais forfaitisés
           foreach ( $infosForfait as $libelle) {
               ?>
                <th><?php  echo $libelle['libelle'] ; ?></th>
            <?php
           }
            ?>
        </tr>
        <tr>
            <?php
            // second parcours du tableau des frais forfaitisés du visiteur connecté
            // pour afficher la ligne des quantités des frais forfaitisés
            foreach ( $infosForfait as $unLibelle ) {
            ?>
                <td class="qteForfait"><?php echo $unLibelle["quantite"] ; ?></td>
            <?php
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
                 <td><?php
                 $i=0;
            while (count($infosHorsForfait)>$i) {
            ?>
                <tr>
                   <td><?php echo $infosHorsForfait[$i]["date"] ; ?></td>
                   <td><?php echo $infosHorsForfait[$i]["libelle"] ; ?></td>
                   <td><?php echo $infosHorsForfait[$i]["montant"] ; ?></td>
                </tr>
            <?php
                        $i++;
                        }
            ?>
             </tr>

    </table>
  </div>
  
  </div>