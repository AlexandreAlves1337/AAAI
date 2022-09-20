
var mailRegex = new RegExp (/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/); // Typique e-mail
var telRegex = new RegExp (/^0[1-9]([-. ]?[0-9]{2}){4}$/); // Numero

function verifiera(f)
{
	var pseudoOK = verifPseudo(f.pseudo);
	var mailOK = verifMail(f.email);
	var avisOK = verifAvis(f.avis);
	var result = false;
	
	if ( pseudoOK && mailOK && avisOK ) // si tout est OK
	{
	result=true;
	alert("Nous avons reçu votre avis, nous le mettrons en ligne après validation.");
	}
	else
	{
	result=false;
	alert("Veuillez remplir tous les champs du formulaire correctement.");
	}
	return result;
}

function verifierc(f)
{
	var nomOK = verifNom(f.nom);
	var prenomOK = verifPrenom(f.prenom);
	var telOK = verifTel(f.tel);
	var mailOK = verifMail(f.email);
	var demandeOK = verifDemande(f.demande);
	var result = false;
	
	if ( nomOK && prenomOK && telOK && mailOK && demandeOK ) // si tout est OK
	{
	result=true;
	alert("Nous avons bien reçu votre demande, nous vous contacterons rapidement.");
	}
	else
	{
	result=false;
	alert("Veuillez remplir tous les champs du formulaire correctement.");
	}
	return result;
}

function verifiert(f)
{
	var nomOK = verifNom(f.nom);
	var tarbOK = verifTar(f.tar);
	var result = false;
	
	if ( nomOK && tarOK ) // si tout est OK
	{
	result=true;
	alert("Nous avons reçu votre avis, nous le mettrons en ligne après validation.");
	}
	else
	{
	result=false;
	alert("Veuillez remplir tous les champs du formulaire correctement.");
	}
	return result;
}

function verifPseudo(champ)
{
	var result = false;
	var pseudoRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (pseudoRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 2 || champ.value.length > 50)
			{
			alert("Votre pseudo ne doit pas excéder 50 caractères.");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}


function verifNom(champ)
{
	var result = false;
	var nomRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (nomRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 2 || champ.value.length > 50)
			{
			alert("Votre nom ne doit pas excéder 50 caractères.");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}


function verifPrenom(champ)
{
	var result = false;
	var prenomRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (prenomRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 2 || champ.value.length > 50)
			{
			alert("Votre prénom ne doit pas excéder 50 caractères.");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}


function verifTel(champ)
{
	var result = false;
	var telRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (telRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result = telRegex.test(champ.value))
			{		
			surligneErreur(champ, false);
			}
		else
			{
			alert("Le format de votre numéro de téléphone est incorrect. Veuillez tapez votre numéro à dix chiffres.");
			surligneErreur(champ, true);
			}	
		return result;
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}


function verifMail(champ)
{
	var result = false;
	var mailRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (mailRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result = mailRegex.test(champ.value))
			{		
			surligneErreur(champ, false); // pas d'erreur 
			}
		else
			{
			alert("Le format de votre adresse e-mail est incorrect.");
			surligneErreur(champ, true);	// erreur
			}
		return result;
	}
	else	// Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
	
}


function verifAvis(champ)
{
	var result = false;
	var avisRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (avisRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 1 || champ.value.length > 400)
			{
			alert("Votre demande ne doit pas excéder 400 caractères.");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}


function verifDemande(champ)
{
	var result = false;
	var demandeRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (demandeRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 1 || champ.value.length > 2000)
			{
			alert("Votre demande ne doit pas excéder 2000 caractères.");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}

function verifTar(champ)
{
	var result = false;
	var tarRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (tarRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if(champ.value.length < 1 || champ.value.length > 3)
			{
			alert("Jamais plus de 100 euros...");
			surligneErreur(champ, true);
      		return false;
			}
		else
			{
			surligneErreur(champ, false);
      		return true;
			}
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "#fba";
	}
}

// Renvoi false si le champ n'est pas rempli
function champRempli(champ)
{
	var result;
	if (champ.value == "")
	{
		result = false;
	}
	else
	{
		result = true;
	}	
	return result;
}

/* Si les champs ne sont pas bien remplis, on surligne le champ */
function surligneErreur(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";	// couleur rouge
   else
      champ.style.backgroundColor = ""; // couleur jaune
}

function surligner(obj){
	obj.style.backgroundColor= "#ee842e";
}
function desurligner(obj){
	obj.style.backgroundColor= "";
}