<?php
/* Smarty version 5.8.5, created on 2026-11-06 15:43:49
  from 'file:afficher_blog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.5',
  'unifunc' => 'content_6aede7a50fedd2_88703983',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dffbc2a869d1d4a116567fef0d4e0838ba5060f' => 
    array (
      0 => 'afficher_blog.tpl',
      1 => 1793974856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6aede7a50fedd2_88703983 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\blog\\templates';
?><html>
<head>
<title><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('titre'), ENT_QUOTES, 'UTF-8', true);?>
</title>

<style>
body { font-family: sans-serif; font-size: 12px; }
h1 { font-size: 20px; }
.commentaire { margin-bottom: 10px; }
#form_commentaire { display: none; }
</style>
<?php echo '<script'; ?>
>
// Affiche le formulaire caché quand on clique sur le lien
function afficher_formulaire() {
    document.getElementById('form_commentaire').style.display = 'block';
}
<?php echo '</script'; ?>
>

</head>
<body>
<a href="index_blog.php">Mon blog</a>

<h1><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('billet')['titre'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
<p><?php echo $_smarty_tpl->getValue('billet')['date_fr'];?>
</p>
<p><?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->getValue('billet')['contenu'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>
</p>
<p>Catégorie : <a href="index_blog.php?categorie=<?php echo rawurlencode((string)$_smarty_tpl->getValue('billet')['categorie']);?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('billet')['categorie'], ENT_QUOTES, 'UTF-8', true);?>
</a></p>

<h3>Commentaires</h3>
<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('commentaires')) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new \Smarty\Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
<div class="commentaire">
    <b><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('commentaires')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['nom'], ENT_QUOTES, 'UTF-8', true);?>
</b> - <?php echo $_smarty_tpl->getValue('commentaires')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['date_fr'];?>
<br />
    <?php echo nl2br((string) htmlspecialchars((string)$_smarty_tpl->getValue('commentaires')[($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)]['comment'], ENT_QUOTES, 'UTF-8', true), (bool) 1);?>

</div>
<?php }} else {
 ?>
<p>Aucun commentaire pour le moment.</p>
<?php
}
?>

<a href="#" onclick="afficher_formulaire(); return false;">Ajouter un commentaire</a>

<div id="form_commentaire">
<form method="post" action="commenter_blog.php">
    <input type="hidden" name="ID" value="<?php echo $_smarty_tpl->getValue('billet')['ID'];?>
" />
    Nom : <input type="text" name="nom" maxlength="50" /><br />
    <textarea name="commentaire" rows="5" cols="40"></textarea><br />
    <input type="submit" value="Commenter" />
</form>
</div>
</body>
</html>
<?php }
}
