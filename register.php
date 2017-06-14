<?php
include 'header.php';
?>
<h2>Create a new account</h2>
<form id="register">
    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password_validate" name="password_validate" class="form-control" placeholder="Confirm Password">
    </div>
    <div class="form-group">
        <input class="btn btn-primary btn-block" type="submit" name="submit" value="Register">
    </div>
</form>
<?php
include 'footer.php'
?>