<?php
include 'header.php';
?>
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
        <input type="submit" name="submit" value="Register">
    </div>
</form>
<?php
include 'footer.php'
?>
