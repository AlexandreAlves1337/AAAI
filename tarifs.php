<?php
$nav_en_cours = 'Tarifs';
$desc = 'Voici dans un souci de clarté, la liste des formules d\'assistance informatique que je propose avec les tarifs qui y sont associées.'
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>

<div id="corps">

	<div class="cth1">
		<div class="th1"><h1>Une prestation + une commune = un tarif attractif, simple et définitif</h1></div>
	</div>

<h2>Voici le récapitulatif des tarifs de nos prestations. Pour chaque prestation, deux tarifs. Un tarif bleu correspondant à la zone géographique de Châtellerault et des villages alentours, et un tarif orange pour les villages un peu plus éloignés. Vous pouvez trouver en bas du site la liste des communes classées par zone.</h2>

<table class="tarifs">
<caption><a href="conseils.php">CONSEILS</a></caption>
<tr><td>Matériel informatique :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Téléphonie mobile :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Accès distant :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
</table>

<table class="tarifs">
<caption><a href="installation.php">INSTALLATION</a></caption>
<tr><td>Installation basique :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Installation imprimante :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Installation internet :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Installation complète :</td><td class="bleu">49€</td><td class="orange">59€</td></tr>
<tr><td>Installation Windows/Linux :</td><td class="bleu">59€</td><td class="orange">69€</td></tr>
<tr><td>Installation réseau domestique :</td><td class="bleu">69€</td><td class="orange">79€</td></tr>
</table>

<table class="tarifs">
<caption><a href="formation.php">FORMATION</a></caption>
<tr><td>Formule une heure :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Formule deux heures :</td><td class="bleu">39€</td><td class="orange">49€</td></tr>
</table>

<table class="tarifs">
<caption><a href="maintenance.php">MAINTENANCE</a></caption>
<tr><td>Formule assistance :</td><td class="bleu">29€</td><td class="orange">39€</td></tr>
<tr><td>Formule remise en forme :</td><td class="bleu">39€</td><td class="orange">49€</td></tr>
<tr><td>Formule maintenance :</td><td class="bleu">59€</td><td class="orange">69€</td></tr>
</table>

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/bas.php"); ?>