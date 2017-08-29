<?php

   if(isset($_GET['cid'])&&!empty($_GET['cid']) )
    {
      $cid=$_GET['cid'];
       //echo $cid;
    

  $fileExistsFlag = 0; 
  $fileName = $_FILES['Filename']['name'];
  //$link = mysqli_connect("localhost","root","","Project") or die("Error ".mysqli_error($link));
  //$query = "SELECT filename FROM file WHERE filename='$fileName'";
  //$query = "SELECT SNO FROM LECTURE WHERE SNO='$fileName' AND COURSE_ID='111'";//replace 111 with variable course ID  
  //$result = $link->query($query) or die("Error : ".mysqli_error($link));
  /*
  *   If file is not present in the destination folder
  */
    //$target = "/opt/lampp/htdocs/ADP Project/academic-educa";    
    $fileTarget = "Lectures/$cid/".$fileName; //replace 111 with variable course ID
    $tempFileName = $_FILES["Filename"]["tmp_name"];
    $fileDescription = $_POST['Description']; 
    $result = move_uploaded_file($tempFileName,$fileTarget);
    echo $tempFileName;
  }
    /*
    * If file was successfully uploaded in the destination folder
    */
    if($result) { 

      //header:('Location:x.php');
      echo "Your file <html><b><i>".$fileName."</i></b></html> has been successfully uploaded";   
      /*$query = "INSERT INTO LECTURE(filepath,filename,description) VALUES ('$fileTarget','$fileName','$fileDescription')";
      $link->query($query) or die("Error : ".mysqli_error($link));  */    
               }
    else 
    {      
      echo "Sorry !!! There was an error in uploading your file";     
    }
    //mysqli_close($link);
?>
