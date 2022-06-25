<?php
require('connection.php');


// for registration
if(isset($_POST['submit'])){
    $username = $_POST['enrollment_no'];
  	$email = $_POST['email'];
    $user_exist_query = "SELECT `name`, `enrollment_no`, `email`, `password` FROM `student` WHERE enrollment_no = '$username' OR email = '$email'";
    $result = mysqli_query($con,$user_exist_query);
    if($result){
        if(mysqli_num_rows($result) >= 1){
            $result_fetch = mysqli_fetch_assoc($result);
            if($result_fetch['enrollment_no'] == $_POST['enrollment_no']){
                echo "
                <script>
                    alert(' $result_fetch[enrollment_no] - Username already taken');
                    window.location.href='admin_dashboard.php';
                </script>
                ";
            }
            else{
                echo "
                <script>
                    alert(' $result_fetch[email] - E-mail already taken');
                    window.location.href='admin_dashboard.php';
                </script>
                ";
            }
        }
        else
            {
            $query = "INSERT INTO `student`(`name`, `enrollment_no`, `email`, `password`) VALUES ('$_POST[name]','$_POST[enrollment_no]','$_POST[email]','$_POST[password]')";
            if(mysqli_query($con,$query)){
                echo "
                <script>
                    alert('Registration Successful');
                    window.location.href='admin_dashboard.php';
                </script>
                ";
            }
            else{
                echo "
                <script>
                    alert('Registration Failed.');
                    window.location.href='admin_dashboard.php';
                </script>
                ";
            }
        }
    }
   
    else{
        echo"
        <script>
        alert('Cannot run query');
        window.location.href='admin_dashboard.php';
        </script>
        ";
    }
}

?>
