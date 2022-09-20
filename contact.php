<?php
// Tableau contenant les messages d'erreur lies a la validation de chaque 
// champ du formulaire.
// On utilisera le nom du champ comme cle du tableau
$errs = array();

$nom = "";
$prenom = "";
$tel = "";
$email = "";
$demande = "";

// S'il s'agit du premier affichage, le bouton submit n'a pas ete presse
// il n'y a pas de validation a effectuer. Sinon $_POST["submit"] n'est pas
// vide (et contient la valeur "Enregistrer")
if (isset($_POST['submit'])) {
if (isset($_POST['host']) && empty($_POST['host'])) //Si "host" est vide
{  

    $nom = stripSlashes($_POST["nom"]);
    if (strlen($nom) == 0) 
        $errs["nom"][] = "Veuillez indiquer votre nom";
    if (strlen($nom) > 50) 
        $errs["nom"][] = "Votre nom ne doit pas excéder 50 caractères.";

    $prenom = stripSlashes($_POST["prenom"]);
    if (strlen($prenom) == 0) 
        $errs["prenom"][] = "Veuillez indiquer votre prénom";
    if (strlen($prenom) > 50) 
        $errs["prenom"][] = "Votre prénom ne doit pas excéder 50 caractères.";

    $tel = stripSlashes($_POST["tel"]);
    if (strlen($tel) == 0) {
        $errs["tel"][] = "Veuillez indiquer votre numéro de téléphone";
    } elseif (!preg_match('#^0[1-9]([-. ]?[0-9]{2}){4}$#',$tel)) {
        $errs["tel"][] = "Le format de votre numéro de téléphone est incorrect. Veuillez tapez votre numéro à dix chiffres.";
    }

    $email = stripSlashes($_POST["email"]);
    if (strlen($email) == 0) {
        $errs["email"][] = "Veuillez indiquer votre adresse e-mail";
    } elseif (!preg_match('#^[[:alnum:]]([-_.]?[[:alnum:]])*@[[:alnum:]]([-_.]?[[:alnum:]])*\.([a-z]{2,4})$#',$email)) {
        $errs["email"][] = "Le format de votre adresse e-mail est incorrect.";
    }
    
    $demande = stripSlashes($_POST["demande"]);
    if (strlen($demande) == 0) 
        $errs["demande"][] = "Veuillez formuler votre demande";
    if (strlen($demande) > 2000) 
        $errs["demande"][] = "Votre demande ne doit pas excéder 2000 caractères.";

    if (count($errs) == 0) {

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO contact (nom, prenom, tel, email, temps, choix, demande, valide) VALUES(?, ?, ?, ?, NOW(), ?, ?, 0)');
$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'], $_POST['choix'], $_POST['demande']));
}
}}
?>
<div id="contact">
<div class="contform">
<p class="tcont">FORMULAIRE DE CONTACT</p>
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
elseif (isset($_POST['submit']) && (count($errs) == 0)) {
echo "<p class=\"ok\">Nous avons bien reçu votre demande, nous vous contacterons rapidement.</p>"; }
?>
<form method="post" action="<?php include($_SERVER['DOCUMENT_ROOT'] . "/vcontact.php"); ?>#contact" onsubmit="return verifierc(this);">
<div class="vcoor">
<fieldset>
<legend>VOS COORDONEES</legend>
<input class="host" id="host" name="host" type="text" value=""/>
<ul>
<li><label for="nom">Quel est votre nom</label><input type="text" id="nom" name="nom" onblur="verifNom(this)" value="<?php if (count($errs) == 0)  echo "";  else echo htmlEntities($nom); ?>" required/></li>
<li><label for="prenom">Quel est votre prénom</label><input type="text" id="prenom" name="prenom" onblur="verifPrenom(this)" value="<?php if (count($errs) == 0)  echo "";else echo htmlEntities($prenom); ?>" required/></li>
<li><label for="tel">Quel est votre numéro de téléphone</label><input type="tel" id="tel" name="tel" onblur="verifTel(this)" value="<?php if (count($errs) == 0)  echo ""; else echo htmlEntities($tel); ?>" required/></li>
<li><label for="email">Quelle est votre adresse e-mail</label><input type="email" id="email" name="email" onblur="verifMail(this)" value="<?php if (count($errs) == 0)  echo "";  else echo htmlEntities($email); ?>" required/></li>
</ul>
</fieldset>
</div>
<div class="vdem">
<fieldset>
<legend>VOTRE DEMANDE</legend>
<ul>
<li>
<label for="choix">Sur quel domaine porte votre demande</label>
	<select name="choix" id="choix">
		   <option value="Conseils">Conseils</option>
           <option value="Installation">Installation</option>
		   <option value="Formation">Formation</option>
           <option value="Maintenance">Maintenance</option>
           <option value="Plusieurs ou autre">Plusieurs ou autre</option>
       </select>
</li>
<li><label for="demande">Quel est votre demande</label><textarea id="demande" name="demande" rows="6" onblur="verifDemande(this)" required><?php if (count($errs) == 0)  echo "";else echo htmlEntities($demande); ?></textarea></li>
</ul>
</fieldset>
</div>
<div class="venv">
<input type="submit" name="submit" value="Validez votre demande" />
</div>
</form>
</div>

</div>
