
<div id="contenu">
      <h2>Suivi des fiches frais validées</h2>
      <h3>Fiche à sélectionner </h3>
      <form action="index.php?uc=etatFrais&action=obtenirFicheFraisValide" method="post">
      <div class="corpsForm">
          <input type="hidden" name="etape" value="validerConsult" />
       <p>
        <label for="lstVis">Visiteur : </label>
        <select id="lstVis" name="lstVis" title="Sélectionnez le visiteur souhaité pour la fiche de frais">
            <?php 
                $pdo->getFichesValidés(); //Affiche toutes les fiches validés
?>
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20"
               title="Demandez à consulter cette fiche de frais" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>
