<?php 
include ('classes/action.php');
  $manufacturer = new Manufacturer;
  $results = $manufacturer->getNames();
  $arr = array();
  
  foreach($results as $key => $val){
      if(array_key_exists("name",$val)){
          $arr[] = $val['name'];
      }
  }

?>
<section id="section-model">
  <div class="ui container">
    <div class="ui segment">
        <h2 class="ui image header">
          <div class="content">
            Add Model
          </div>
        </h2>
        <form class="ui form" id="modelAdd">
          <div class="two fields">
            <div class="field">
              <label>Model</label>
              <input name="model" type="text" id="model">
            </div>
            <div class="field">
              <label>Manufacturer</label>
              
              <select class="ui fluid dropdown manufacturer" name="manufacturer">
                <option value="">Select</option>
                <?php foreach($arr as $key=> $val){ ?>
                <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                <?php } ?>
              </select>
            </div>
            </div>
              <div class="two fields">
                <div class="field">
                  <label>Color</label>
                  <input name="color" type="text" id="color">
                </div>
                <div class="field">
                  <label>Year of Manufacturing</label>
                  <input name="year" type="text" id="year">
                </div>
              </div>
              <div class="two fields">
                <div class="field">
                  <label>Registration Number</label>
                  <input name="registration" type="text" id="registration">
                </div>
                <div class="field">
                  <label>Note</label>
                  <input name="note" type="text" id="note">
                </div>
              </div>
              <div class="field">
                <div id="fileuploader">Upload</div>
              </div>
              <div class="ui submit button" id="send" name="upload">Submit</div>
                <!-- <button class="ui button" name="upload" id="send">Submit</button> -->
              <div class="ui error message"></div>
              
        </form>
        <div id="printdata"></div>
      </div>
  </div>
       
        
</section>