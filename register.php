
     <?php
     //connect to db
     include 'connect.php';
     //run this code only when the user click register
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // pick date user has entered
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $user_account = $_POST['user_account'];
     }
        // create operation/insert
        $sql ="INSERT INTO users(fullname,email,dob,username,phone,password,user_account) value('$fullname','$email','$dob','$username',$phone,'$password','$user_account')";
        //execute query
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo "registration successful";
        } else {
            die(mysql_error($connect));
        }