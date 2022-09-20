<?php include($_SERVER['DOCUMENT_ROOT'] . '/config.php'); ?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8" />
<title><?php
if ($nav_en_cours == 'Accueil') echo 'Assistance informatique à Châtellerault';
else if ($nav_en_cours == 'Tarifs') echo 'Liste de nos formules et tarifs';
else if ($nav_en_cours == 'Accessibilité') echo 'Notre politique d\'accessibilité web';
else if ($nav_en_cours == 'Avis') echo 'Vos avis sur mes prestations';
else if ($nav_en_cours == 'Engagement') echo 'Mes engagements et C.G.V.';
else if ($nav_en_cours == 'Plan') echo 'Plan du site';
else if ($nav_en_cours == 'AdminAvis') echo 'Avis de '.$pseudo.'';
else if ($nav_en_cours == 'AdminDem') echo 'Demande de '.$nom.' '.$prenom.'';
else if ($nav_en_cours == 'Admin') echo 'Administration générale';
else echo '' . $nav_en_cours . ' informatique à Châtellerault';?></title>
<meta name="Description" content="<?php echo $desc ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/css/css.css">
<script type="text/javascript">//<![CDATA[ // src="/script/form.js" //]]></script>
<script type="text/javascript" src="/script/form.js"></script>
<link rel="shortcut icon" href="/img/favicon.ico" />
</head>

<body>

<div class="access">
	<ul>
		<li><a href="/access.php">Politique d'accessibilité</a></li>
		<li><a href="#menu">Aller au menu</a></li>
		<li><a href="#corps">Aller au contenu</a></li>
	</ul>
</div>

<header>
<div id="tete">
	<div class="logo"><a href="/"><img src="/img/bannieresite.png" alt="Logo AA-AI" title="Retour à l'accueil" /></a></div>
	<div id="menu" class="nav">
		<ul>
			<li<?php if ($nav_en_cours == 'Conseils') {echo ' class="actif"';} ?>><a href="/conseils.php"><img src="/img/icones/018.png" alt="ampoule" title="Conseils" />CONSEILS</a></li>
			<li<?php if ($nav_en_cours == 'Installation') {echo ' class="actif"';} ?>><a href="/installation.php"><img src="/img/icones/026.png" alt="clé" title="Installation" />INSTALLATION</a></li>
			<li<?php if ($nav_en_cours == 'Formation') {echo ' class="actif"';} ?>><a href="/formation.php"><img src="/img/icones/002.png" alt="personnage" title="Formation" />FORMATION</a></li>
			<li<?php if ($nav_en_cours == 'Maintenance') {echo ' class="actif"';} ?>><a href="/maintenance.php"><img src="/img/icones/025.png" alt="engrenage" title="Maintenance" />MAINTENANCE</a></li>
			<li<?php if ($nav_en_cours == 'Tarifs') {echo ' class="actif"';} ?>><a href="/tarifs.php"><img src="/img/icones/036.png" alt="euro" title="tarifs" />TARIFS</a></li>
		</ul>
	</div>
</div>
</header>