<?php 
    require('pages/header.php');
?> 
<?php  
  if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
        case "model": 
        require('pages/model.php');
        break;

        case "inventory": 
        require('pages/inventory.php');
        break;
        
        default:     
        require('pages/manufacturer.php');
        break;
       }
    }
?>


<?php
    require('pages/footer.php');
?>
