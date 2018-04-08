$(document).ready(function()
{

    $('#myTable').DataTable();
    var name = $("#model").val();
    var color = $("#color").val();
    var year = $("#year").val();
    var registration = $("#registration").val();
    var note = $("#note").val();
    var i = new Date($.now());
    var manName="";

    $(document).on('change', '.manufacturer', function(){
      manName = $(this).val();
    });

    var uploadObj = $("#fileuploader").uploadFile({
      url:"../../inventory/classes/action.php",
      fileName: "myfile",
      acceptFiles:"image/*",
      autoSubmit: false,
      multiple:true,
      maxFileCount:2,
      sequential:false,
      dynamicFormData: function()
          {
            var data ={ name:$("#model").val(), color:$("#color").val(), year:$("#year").val(), ManName : manName, registration: $("#registration").val(),note: $("#note").val(), upload:"upload" }
            return data;
          },
      onSuccess:function(files,data,xhr,pd)
          {
              alert(data);
              uploadObj.reset();
              $('#modelAdd').find("input[type=text]").val("");

          }
        
      
      });
      
    $("#send").click(function(){
      uploadObj.startUpload();
      return false;
    });
    
    $(".view-data").click(function(){
      var id = this.id;
      
      $.ajax({
        url: '../../inventory/classes/action.php',
        type:'post',
        data: {id: id,cart: 1},
        success: function(data){
          var objMsg = JSON.parse(data);
          $("#mYear").html(objMsg[0].manufacturing_year);
          $("#mCarName").html(objMsg[0].name);
          $("#mName").html(objMsg[0].manufacturer);
          $("#mColor").html(objMsg[0].color);
          $("#mRegistration").html(objMsg[0].name);
          var img = (objMsg[0].img1);
          var id = (objMsg[0].id);
          $("#mCarImg").attr("src", "classes/uploads/"+img+"");
          $("#sold").attr("name", ""+id+"");
          $('.ui.modal')
          .modal('show');
        }
      });
    });

    $("#sold").click(function(){
      id= this.name;
      $.ajax({
        url: '../../inventory/classes/action.php',
        type: 'post',
        data: {id : id, remove:1},
        success: function(data){
          location.reload();
        }
      });

    });

    
    


  $('.ui.form')
    .form({
      fields: {
        manufacturer : ['minLength[2]', 'empty'],
        model : ['minLength[2]', 'empty'],
        registration : ['empty'],
        year : ['empty'],
        color: ['minLength[3]', 'empty'],
        
      }
    });

    

});