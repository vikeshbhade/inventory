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
    else{
        ?>
        <section>
            <div class="ui container">
                <div class="ui segment">
                    <ul class="ui list">
                        <li>Click On <b>Manufacturer</b> to add Manufacturers</li>
                        <li>Click On <b>Model</b> to add Models</li>
                        <li>Click On <b>Inventory</b> to view Inventory Details</li>
                    </ul>
                </div>
            </div>
        </section>
        <?php
    }
?>


<?php
    require('pages/footer.php');
?>
