<html>
<head>
<title>{$titre|escape}</title>
{literal}
<style>
body { font-family: sans-serif; font-size: 12px; }
h1 { font-size: 20px; }
.commentaire { margin-bottom: 10px; }
#form_commentaire { display: none; }
</style>
<script>
// Affiche le formulaire caché quand on clique sur le lien
function afficher_formulaire() {
    document.getElementById('form_commentaire').style.display = 'block';
}
</script>
{/literal}
</head>
<body>
<a href="index_blog.php">Mon blog</a>

<h1>{$billet.titre|escape}</h1>
<p>{$billet.date_fr}</p>
<p>{$billet.contenu|escape|nl2br}</p>
<p>Catégorie : <a href="index_blog.php?categorie={$billet.categorie|escape:'url'}">{$billet.categorie|escape}</a></p>

<h3>Commentaires</h3>
{* {section} parcourt le tableau $commentaires : i est l'indice courant *}
{section name=i loop=$commentaires}
<div class="commentaire">
    <b>{$commentaires[i].nom|escape}</b> - {$commentaires[i].date_fr}<br />
    {$commentaires[i].comment|escape|nl2br}
</div>
{sectionelse}
<p>Aucun commentaire pour le moment.</p>
{/section}

<a href="#" onclick="afficher_formulaire(); return false;">Ajouter un commentaire</a>

<div id="form_commentaire">
<form method="post" action="commenter_blog.php">
    <input type="hidden" name="ID" value="{$billet.ID}" />
    Nom : <input type="text" name="nom" maxlength="50" /><br />
    <textarea name="commentaire" rows="5" cols="40"></textarea><br />
    <input type="submit" value="Commenter" />
</form>
</div>
</body>
</html>
