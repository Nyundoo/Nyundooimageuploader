<?php
if (logged_in()) {
    echo 'Hello';
} else{
    
?>

<form action="" method="post">
    <p>
        Email: <input type="email" name="login_email" />
        Password: <input type="password" name="login_password" />
        <input type="submit" value="Log in" />
    </p>
</form>

<?php
}
?>