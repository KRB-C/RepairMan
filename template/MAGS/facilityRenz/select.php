<?php  
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "repairman");  
      $query = "SELECT * FROM facilities WHERE id = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>ID:</label></td>  
                     <td width="70%">'.$row["id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>ITEM NAME:</label></td>  
                     <td width="70%">'.$row["Item_Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>SERIAL NUMBER:</label></td>  
                     <td width="70%">'.$row["Serial_Num"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>WARRANTY COVERAGE:</label></td>  
                     <td width="70%">'.$row["Warranty"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>STATUS:</label></td>  
                     <td width="70%">'.$row["Status"].'</td>  
                </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
