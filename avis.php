<?php $nav_en_cours = 'Avis';
$desc = 'Retrouvez tous les avis des clients qui m\'ont fait confiance, et déposez vous même votre avis sur ma prestation chez vous.'
?>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>

<div id="corps">

	<div class="cth1">
		<div class="th1"><h1>Cette page est la votre. Lisez et déposez à votre guise</h1></div>
	</div>

<?php
// Récupération des 5 derniers messages
    $reponse = $bdd->query('SELECT pseudo, avis FROM avis WHERE valide=2 ORDER BY ID DESC LIMIT 0, 4');
    
    // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
    while ($donnees = $reponse->fetch())
    { ?>
		<div class="avis">
		<p class="txtavis"><?php $avis = (nl2br(stripslashes($donnees['avis']))); echo $avis; ?></p>
		<p class="txtpseudo"><?php $pseudo = (stripslashes($donnees['pseudo'])); echo $pseudo; ?></p>
		</div>
    <?php
	}
    $reponse->closeCursor();
?>

<?php
// Tableau contenant les messages d'erreur lies a la validation de chaque 
// champ du formulaire.
// On utilisera le nom du champ comme cle du tableau
$errs = array();

$pseudo = "";
$email = "";
$avis = "";

// S'il s'agit du premier affichage, le bouton submit n'a pas ete presse
// il n'y a pas de validation a effectuer. Sinon $_POST["submit"] n'est pas
// vide (et contient la valeur "Enregistrer")

if (isset($_POST['submita'])){  
if (isset($_POST['host']) && empty($_POST['host'])) //Si "host" est vide 
{

    $pseudo = stripSlashes($_POST["pseudo"]);
    if (strlen($pseudo) == 0)
        $errs["pseudo"][] = "Veuillez indiquer votre pseudo";
    if (strlen($pseudo) == 1)
        $errs["pseudo"][] = "Veuillez indiquer votre pseudo";
    if (strlen($pseudo) > 50) 
        $errs["pseudo"][] = "Votre pseudo ne doit pas excéder 50 caractères.";
        

    $email = stripSlashes($_POST["email"]);
    if (strlen($email) == 0) {
        $errs["email"][] = "Veuillez indiquer votre adresse e-mail";
    } elseif (!preg_match('#^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-_.]?[[:alnum:]])*\.([a-z]{2,4})$#',$email)) {
        $errs["email"][] = "Le format de votre adresse e-mail est incorrect.";
    }
    

    $avis = stripSlashes($_POST["avis"]);
    if (strlen($avis) == 0) 
        $errs["avis"][] = "Veuillez formuler votre avis";
    if (strlen($avis) > 400) 
        $errs["avis"][] = "Votre avis ne doit pas excéder 400 caractères.";

    if (count($errs) == 0) {
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO avis (pseudo, email, temps, avis, valide) VALUES(?, ?, NOW(), ?, 0)');
$req->execute(array($_POST['pseudo'], $_POST['email'], $_POST['avis']));
}}}

?>
<div class="contavis">
<form method="post" action="" onsubmit="return verifiera(this);">
<?php
// Si des erreurs ont été trouvée, les afficher sous forme de liste
if (count($errs) == 1) {
    echo "<div class=\"err\"><p class=\"ok\">Oups... Il y a une erreur<br />Corrigez-la afin que votre demande me parvienne correctement</p><ol>";
    foreach ($errs as $champEnErreur => $erreursDuChamp) {
        foreach ($erreursDuChamp as $erreur) {
            echo "<li>".$erreur."</li>";
        }
    }
    echo "</ol></div>";
}
elseif (count($errs) > 1) {
    echo "<div class=\"err\"><p class=\"ok\">Oups... Il y a quelques erreurs<br />Corrigez-les afin que votre demande me parvienne correctement</p><ol>";
    foreach ($errs as $champEnErreur => $erreursDuChamp) {
        foreach ($erreursDuChamp as $erreur) {
            echo "<li>".$erreur."</li>";
        }
    }
    echo "</ol></div>";
}
elseif (isset($_POST['submita']) && (count($errs) == 0)) {
echo "<p class=\"ok\">Nous avons reçu votre avis, nous le mettrons en ligne après validation.</p>"; }
?>
<div class="vavis">
<fieldset>
<legend>VOTRE AVIS</legend>
<input class="host" id="ahost" name="host" type="text" value=""/>
<ul>
<li><label for="apseudo">Indiquez votre nom ou pseudo</label>
<input type="text" id="apseudo" name="pseudo" onblur="verifPseudo(this)" value="<?php if (count($errs) == 0)  echo "";  else echo htmlEntities($pseudo); ?>" required/></li>
<li><label for="aemail">Indiquez votre adresse e-mail</label>
<input type="text" id="aemail" name="email" onblur="verifMail(this)" value="<?php if (count($errs) == 0)  echo "";  else echo htmlEntities($email); ?>" required/></li>
<li><label for="avis">Donnez nous votre avis</label>
<textarea id="avis" name="avis" rows="8" onblur="verifAvis(this)" required><?php if (count($errs) == 0)  echo "";  else echo htmlEntities($pseudo); ?></textarea></li>
</ul>
</fieldset>
</div>
<div class="venv">
<input type="submit" name="submita" value="Envoyez votre avis" />
</div>
</form>
</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/bas.php"); ?>