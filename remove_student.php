<?php
require('connection.php');

// for registration
if(isset($_POST['submit_delete'])){
    $username = $_POST['enrollment_no'];
    $user_exist_query = "SELECT `enrollment_no` FROM `student` WHERE enrollment_no = '$username' ";
    $result = mysqli_query($con,$user_exist_query);
    if($result){
        if(mysqli_num_rows($result) >= 1){
            $sql = "DELETE FROM `student` WHERE enrollment_no = '$username' ";
            if (mysqli_query($con, $sql)) {
                echo "Record deleted successfully";
            } 
            else {
                echo "Error deleting record: " . mysqli_error($con);
            }
        }
        else{
            echo "
                <script>
                    alert('Record not found.');
                    window.location.href='admin_dashboard.php';
                </script>
                ";
        }
    }
}


?>
