<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <p>Please fill out the from below :- </p>
    <form action="submit_from.php" method="post">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="Full_name" value="<?php echo isset($_POST['full_name'])?
        htmlspecialchars($_POST['full_name']) : '';?>" requireed
        <br>

        <label for="phone_number">Phone Number</label>
        <input type="tel" id="phone_number" name="phone_number" value="<?php echo isset($_POST['phone_number'])?
        htmlspecialchars($_POST['phone_number']) : '';?>" requireed
        <br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email'])?
        htmlspecialchars($_POST['email']) : '';?>" requireed
        <br>

        <label for="subject">Full Name</label>
        <input type="text" id="subject" name="subject" value="<?php echo isset($_POST['subject'])?
        htmlspecialchars($_POST['subject']) : '';?>" requireed
        <br>

        <label for="message">message</label>
        <textarea id="message" rows="4" required><?php echo isset($_POST['message'])?
        htmlspecialchars($_POST['message']) : '';?></textarea>
        <br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>