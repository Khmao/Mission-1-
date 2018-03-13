<?php

	//permet d'importer des fichiers. évite de réécrire un même code sur chaque page
	include("connexion.php");

?>

<!DOCTYPE html>

<html>
	</body>

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link rel="stylesheet" type="text/css" href="style.css"/>
    
	<form action="formulaire.php" method="post">
		<div>
		
			<img src='http://btssiovoillaume.free.fr/claroline/backends/download.php?url=L01pc3Npb24xL2xvZ28uanBn&cidReset=true&cidReq=2TSLAM_PPE'>
			
			<h1>Visiteur</h1>
			
			<?php // requette SQL permettant de selectionner  tout les mois sans doubon de la table lignefraisforfait
			$resultat = mysqli_query($connexion, "SELECT DISTINCT (mois) 
			FROM lignefraisforfait");
			
			
			?>
		 
		 <label for="numero">Mois/Annee:</label> 
				
				<select name="Mois"> 
				<?php
				Foreach($resultat AS $Ligne) // permet d'afficher via la BD avec la boucle foreach
				{
				?>
				
				
				<option  value= <?php echo $Ligne['mois']?>><?php echo $Ligne['mois']?> </option> 
				<?php
				// Permet d'afficher en php avec le echo les contenus des variables 
				}
				
				?>
				
				</select>
		 
		 <?php
			$resultat = mysqli_query($connexion, "SELECT DISTINCT (idFraisForfait) 
			FROM lignefraisforfait");
			
			
			?>
			
		 <label for="typefrais"> Type de frais:</label>


	          <select name="Type de frais"> 
					<?php
					Foreach($resultat AS $Ligne)
					{
					?>
					
					
					<option  value= <?php echo $Ligne['idFraisForfait']?>><?php echo $Ligne['idFraisForfait']?> </option>
					<?php
					
					}
					
					?>
					
					</select>


		 
		 
		 
		 <p><input type="submit" value="OK"></p>
		 
		<?php
			
			$resultat = mysqli_query($connexion, "SELECT idVisiteur,(montant*quantite) AS prix
													FROM lignefraisforfait
													INNER JOIN fraisforfait ON idFraisForfait=id
													WHERE idFraisForfait = 'ETP'
													AND mois = '201401'");
			
			

			while($donnees = mysqli_fetch_assoc($resultat))
			{
				echo $donnees['idVisiteur'];
				echo "\n";
				echo $donnees['prix'];
			}
		
		?>

		

			
			<h2> Frais au forfait</h2>
		 
		 <table> 
		 <tr> 
			 <td>Mois</td>
			 <td>Montant</td>
			 
		 

		 </tr>						   
		 </table>                                  
		</div>
	</form>
	</body>
</html>