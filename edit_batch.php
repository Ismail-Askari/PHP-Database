<?php  include "header.php"?>

<div class="container-fluid">

<h1>Edit batch Record</h1>

<?php 
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        $query =  "SELECT * FROM `tbl_batch` where batch_id =$id";
        $result = mysqli_query($connection,$query);
        if($result){
            $rows = mysqli_fetch_assoc($result);
        }

    }
?>
<form method="post">
        <div class="row">
            <div class="col-lg">
  <label for="exampleFormControlInput1"  class="form-label">Batch Name</label>
  <input type="text" class="form-control" value="<?php echo  $rows['batch_name']; ?>" name="batch_name" placeholder="Enter Batch Name">
            </div>

            <div class="col-lg">
  <label for="exampleFormControlInput1" class="form-label">Batch Capcity</label>
  <input type="text" class="form-control" value="<?php echo  $rows['batch_capcity']; ?>" name="batch_capcity" placeholder="Enter Batch Capcity">
            </div>
        </div>
    <br><br>

        <div class="row">
        <div class="col-lg">
  <label for="exampleFormControlInput1" class="form-label">Batch Start Date</label>
  <input type="date" value="<?php echo  $rows['batch_start_date']; ?>" class="form-control" name="batch_start_date" placeholder="Enter Batch Start Date">
            </div>

           <div class="col-lg">
           <br>
           <input type="submit" class=" btn btn-primary" value="Update Batch" name="update">
           </div>
        </div>
    </form>

    <?php
        if(isset($_POST["update"])){
            $batch_name =  $_POST["batch_name"];
            $batch_capcity = $_POST["batch_capcity"];
            $batch_start_date = $_POST["batch_start_date"];
            $query = "UPDATE `tbl_batch` SET `batch_name`='$batch_name',`batch_capcity`='$batch_capcity',`batch_start_date`='$batch_start_date' WHERE batch_id =$id";

            $result = mysqli_query($connection,$query);
    
            if($result){
                echo "<script>
                    window.location.href = 'view-batch.php'
                </script>";
            }
        }
     
    ?>
</div>
<?php  include "footer.php"?>