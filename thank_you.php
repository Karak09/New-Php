<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANK YOU</title>
</head>
<body>
    <h1>THANK YOU for contacting us!</h1>

<?php if(isset($_SESSION['form_data'])): ?>
    <p>Hello, <strong><?php echo htmlspecialchars(($_SESSION['form_data']['full_name']));?></strong>.Your message has been send succssfully.</p>
    <p>We have recived the following details: </p>
    <ul>
        <li>Phone Number: <?php
        echo htmlspecialchars($_SESSION['form_data']['phone_number']);?>
        </li>
        <li>Email: <?php
        echo htmlspecialchars($_SESSION['form_data']['email']);?>
        </li>
        <li>Subject: <?php
        echo htmlspecialchars($_SESSION['form_data']['subject']);?>
        </li>
        <li>Message: <?php
        echo htmlspecialchars($_SESSION['form_data']['message']);?>
        </li>
    </ul>
    <p>One of our representatives will get back to you shortly.</p>
    <?php
    unsent($_SESSION['from_data']);
else:
    header('Location: index.php');
    exit;
endif;
?>

</body>
</html>