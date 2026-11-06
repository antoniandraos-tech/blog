<?php
/* Smarty version 5.8.5, created on 2026-11-06 15:43:35
  from 'file:edition_blog.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.5',
  'unifunc' => 'content_6aede797dd76c2_26852886',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25f15185dca15581496fd8e1473710f7ae77e653' => 
    array (
      0 => 'edition_blog.tpl',
      1 => 1793974650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6aede797dd76c2_26852886 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\blog\\templates';
?><html>
<head> 
<title><?php echo $_smarty_tpl->getValue('titre');?>
</title> 

<style>
h1 { 
font-family: sans-serif; 
font-size: 20px; } 
table.champs_saisie { font-family: sans-serif; font-size: 12px; 
}
table.champs_saisie td { 
vertical-align: top; } 
</style> 
 
</head>
<body>
<h1>Nouveau billet</h1>
<form method="post" action="editer_blog.php">
<table class="champs_saisie">
<tr> <td>Titre :</td><td><input name="titre" type="text" /></td> </tr> <tr> <td>Contenu 
:</td> 
<td><textarea name="contenu" rows="15" cols="40"></textarea></td> </tr> 
<tr> <td>Catégorie :</td><td><input name="categorie" type="text" /> </tr>
<tr> <td /><td><input name="submit" type="submit" value="Poster" /></td> </tr> </table>
</form>
</body>
</html><?php }
}
