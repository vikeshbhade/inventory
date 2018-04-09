<?php
include('Manufacturer.php');
include('Model.php');

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($_POST['submit'])){
   $name = $post['manufacturer'];
   $manufacturer = new Manufacturer;
   $records = $manufacturer->getRecords($name);
   if(!empty($records)){
        header('location:../index.php?page="manufacturer"&status="AlreadyExits"');
   }
   else{
        $setManufacturer = $manufacturer->setRecords($name);
        header('location:../index.php?page="manufacturer"&status="success"');
   }
}


if(isset($_POST['upload'])){
    
   $name = $post['name'];
   $color = $post['color'];
   $manufacturer = $post['ManName'];
   $registration = $post['registration'];
   $note = $post['note'];       
   $year = $post['year'];       
   
   $model = new Model;

    $output_dir = "uploads/";
    
    
        
        if(isset($_FILES["myfile"]))
        {

            $error =$_FILES["myfile"]["error"];

       
            if(!is_array($_FILES["myfile"]["name"])) 
            {
                $fileName = $_FILES["myfile"]["name"];
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
                $ret[]= $fileName;
                $status =  $model->checkImgUpload($registration);
                
                    if(!empty($status)){
                        $model->updateRecord($fileName,$registration);
                        echo "Files succesfully updated";
                    }
                    else{
                      
                       $model->setOneRecord($name, $color, $year, $manufacturer, $registration, $note, $fileName);
                    }
					echo "File uploaded Successfully";
            }
                        
        }
    
}

if(isset($_POST['cart'])){
    $car = $post['id'];
    $carDetails = explode(',', $car);
    $carName = $carDetails[0];
    $carManufacturer = $carDetails[1];
    $carColor = $carDetails[2];
    $carYear = $carDetails[3];
    $model = new Model();
    $result = $model->getDetails($carName,$carManufacturer,$carColor,$carYear);
    echo json_encode($result);   
    
}

if(isset($_POST['remove'])){
    $id = $post['id'];
    $model = new Model;
    $status = $model->removeItem($id);
    echo $status;
}


    


