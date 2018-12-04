<!DOCTYPE html>
<html>
<head>
  <title>Lire Corpus</title>
</head>
<body>

<P>
<B>DEBUTTTTTT DU PROCESSUS :</B>.
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>
<?php

include './extractionXml.html';
//Augmentation du temps
//d'exécution de ce script
set_time_limit (50);
$path= "sources";

explorerDir($path);

function explorerDir($path)
{
  $folder = opendir($path);
  while($entree = readdir($folder))
  {
    //On ignore les entrées

    if($entree != "." && $entree != "..")
    {
      // On vérifie si il s'agit d'un répertoire
      if(is_dir($path."/".$entree))
      {
        $sav_path = $path;
        // Construction du path jusqu'au nouveau répertoire
        $path .= "/".$entree;
        //echo "DOSSIER = ", $path, "<BR>";
        // On parcours le nouveau répertoire
        explorerDir($path);
        $path = $sav_path;
      }
      else
      {
        //C'est un fichier xml ou pas
        $path_source = $path."/".$entree;

        if(stripos($path_source, '.xml'))
        {
          echo '<br>';
          echo 'On appelle le module de recherche <br>';
          echo $path_source, '<br>';
          search_author($path_source);
        }
        //Si c'est un .xml
        //On appelle la fonction de recherche
        //Par un include
      }
    }
  }
  closedir($folder);
}
?>
<P>
<B>FINNNNNN DU PROCESSUS :</B>
<BR>
<?php echo " ", date ("h:i:s"); ?>
</P>

</body>
</html>
