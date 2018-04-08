<?php
  include ('classes/Model.php'); 
  $model = new Model;
  $records = $model->getInventoryItems();
    
?>
<section>
    <!-- Model Code written here -->
    <div class="ui modal" id="tableInventory">
      <div class="header">
        <h2 id="mCarName"></h2>
      </div>
      <div class="description">
        <div class="ui horizontal list">
          <div class="item">
            <div class="content">
              <div class="header">FilePhoto</div>
              <img id="mCarImg" src="classes/uploads/1.png" class="ui middle aligned small image" alt="">
            </div>
          </div>
          <div class="item">
            <div class="content">
              <div class="header">Manufacturer</div>
              <h4 id="mName"></h4>
            </div>
          </div>
          <div class="item">
            <div class="content">
              <div class="header">Color</div>
              <h4 id="mColor"></h4>
            </div>
          </div>
          <div class="item">
            <div class="content">
              <div class="header">Registration Year</div>
              <h4 id="mYear"></h4>
            </div>
          </div>
          <div class="item">
            <div class="content">
              <div class="header">Registration Number</div>
              <h4 id="mRegistration"></h4>
            </div>
          </div>
        </div>
      </div>
    <div class="actions">
      <a class="ui primary cancel button">Cancel<i class="cancel icon"></i></a>
      <a class="ui primary approve button" href="#" id="sold" name="">Sold<i class="right chevron icon"></i></a>
		</div>
  </div>
        <!-- Ends Here -->
        <div class="ui container">
            <table class="ui selectable line table" id="myTable">
                <thead>
                  <tr>
                    <th>Serial No.</th>
                    <th>Manufacturer</th>
                    <th>Name</th>
                    <th>Count</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=0; foreach($records as $key=>$val){ $i++?>
                
                  <tr class="view-data" id="<?php echo $val['name'].','.$val['manufacturer'].','.$val['color'].','.$val['year']; ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $val['name']; ?></td>
                    <td><?php echo $val['manufacturer']; ?></td>
                    <td><?php echo $val['count']; ?></td>
                  </tr>
               
                <?php } ?>
                </tbody>
              </table>
        </div>
</section>
       
