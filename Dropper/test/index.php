<?php
function getDropper($name,$id,$options=false)
{
  $opts = ["Child Item 1","Child Item 2","Child Item 3"];
  if (!empty($options))
    $opts = $options;
?>

<div
id="<?=$id;?>"
class="dropper dropper--is-closed">
  <a
  href="#"
  title="Expand menu"
  data-dropper>
    <?=$name.PHP_EOL;?>
    <span class="dropper-icon"></span>
  </a>
  <div
  class="dropper-menu">
    <ul>
      
      <?php foreach($opts as $name) { ?>
      
      <li>
        <a
        href=""
        title="">
          <?=$name.PHP_EOL;?>
        </a>
      </li>
      
      <?php }; ?>
      
    </ul>
  </div>
</div>
    
<?php
};
ob_start();
?>
<!doctype html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../dist/dropper.css?v=1">
    <style>
    body {
      background-color: #eee;
      font-family: helvetica;
    }
    </style>
    <script src="../dist/dropper.js?v=1"></script>
  </head>
  <body>
    
    <?=getDropper("Category","category-droppper",["Markers","Accessories"]);?>
    <?=getDropper("Model","model-droppper",["Earth","Mars","Venus"]);?>
    
    <script>
    window.onload = function()
    {
      // Set options
      //Dropper.config.collapseAllEnabled = false;
      // Initialise
      Dropper.init();
    };
    </script>
  </body>
</html>
<?php
$c = ob_get_clean();
echo $c;
// Output html version
file_put_contents("index.html",$c);
?>