<?php
session_start();
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$full_name=$phone_number = $email= $subject =$message ="";
$full_name_error=$phone_number_error=$email_error=$subject_error=$message_error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty(test_input($_POST["full_name"]))){
            $full_name_error="Full Name is required";
        }else{
            $full_name=test_input($_POST["full_name"]);

            if(!preg_match("/^[a-zA-Z]*$/",$full_name)){
                $full_name_error="Only letter and white space allowed";
        }
    }


    if(empty(test_input($_POST["phone_number"]))){
        $phone_number_error="Phone number is required";
    }else{
        $phone_number=test_input($_POST["phone_number"]);

        if(!preg_match("/^[0-9]{10}$/",$phone_number)){
            $phone_number_error="Invalid phone number";
    }
}

if(empty(test_input($_POST["email"]))){
    $email_error="email is required";
}else{
    $email=test_input($_POST["email"]);

    if(!filter_var($email,FILTER_VALID_EMAIL)){
        $email_error="Invalid email formet";
}
}

if(empty(test_input($_POST["message"]))){
    $message_error="message is required";
}else{
    $message=test_input($_POST["message"]);
}

if(empty(test_input($_POST["subject"]))){
    $subject_error="subject is required";
}else{
    $subject=test_input($_POST["subject"]);
}

if(empty($full_name_error)&& empty($phone_number_error)&& empty($email_error)&& empty($message_error)){
    $sql="INSERT INTO contact_from (full_namee,phone_number,email,subject,message,user-ip,submit_time) VALUES(?,?,?,?,?,?,) NOW())";

    if($stmt=mysql_prepare($link,$sql)){
        mysql_stmt_bind_param($stmt, "sssss", $param_full_name,$param_phone_number,$param_email,$param_subject,$param_message);

        $param_full_name=$full_name;
        $param_phone_number=$phone_number;
        $param_subject=$subject;
        $param_email=$email;
        $param_message=$message;
        $param_user_ip=$_SERVER['REMOTE_ADDR'];

        if(mysql_stmt_execute($stmt)){
            $_SESSION['from_data']=$_POST;
            header("Location:thank_you.php");
            exit();
        }else{
            echo"Oops!Somthings went wrong.Please try again letter.";
        }
    }
    mysql_smt_close($stmt);
}
    mysqli_close(($link));
}else{
    if(isset($_SESSION['from_data'])){
        $full_name=$_SESSION['from_data']['full_name'];
        $phone_number=$_SESSION['from_data']['phone_number'];
        $email=$_SESSION['from_data']['email'];
        $subject=$_SESSION['from_data']['subject'];
        $message=$_SESSION['from_data']['message'];

        unset($_SESSION['from_data']);
    }
}
?>
