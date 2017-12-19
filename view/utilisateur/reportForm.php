 <?php

         echo '<form >';
        echo '<div>';
          echo '<h3>Alerter un modérateur</h3>';

          echo '<label for="puni1">Comportement dangereux ou déplacé</label>';
          echo '<input type="checkbox" name="avis1" id="puni1" value="1" data-mini="true">';
          echo '<label for="puni2">Un problème sur l\'annonce ou le profil</label>';
          echo '<input type="checkbox" name="avis2" id="puni2" value="1" data-mini="true">';
          echo '<label for="puni3">Prix ou méthode de paiement douteux</label>';
          echo '<input type="checkbox" name="avis3" id="puni3" value="1" data-mini="true">';
          echo '<input type="submit" data-inline="true" value="Envoyer">';
        echo '</div></form></div></div>';

?>