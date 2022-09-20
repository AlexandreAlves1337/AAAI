<?php $nav_en_cours = 'Plan';
$desc = 'Le plan du site permet aux personnes qui ne peuvent utiliser un navigateur graphique moderne de naviguer tout de même sur le site.'
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>

<div id="corps">

	<div class="cth1">
		<div class="th1"><h1>Plan du site</h1></div>
	</div>
	
	<div class="wrapper">
		<ul>
			<li><a href="./">Accueil du site</a></li>
			<li><a href="access.php">Politique d'accessibilité</a></li>
		</ul>

		<p class="underline">Menu</p>
		<ul>
			<li><a href="conseils.php">CONSEILS</a></li>
			<li><a href="installation.php">INSTALLATION</a></li>
			<li><a href="formation.php">FORMATION</a></li>
			<li><a href="maintenance.php">MAINTENANCE</a></li>
			<li><a href="tarifs.php">TARIFS</a></li>
		</ul>

		<p class="underline">Bas du site</p>
		<ul>
			<li><a href="#contact.php">formulaire de contact</a></li>
			<li><a href="avis.php">Vos avis</a></li>
			<li><a href="engagement.php">Je m'engage</a></li>
			<li><a href="plan.php">Plan du site</a></li>
		</ul>
	</div>

</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/bas.php"); ?>