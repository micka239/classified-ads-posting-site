<div class="content">
    
    <form action="index.php?page=register" method="POST">
        Full name:<br />
        <input type="text" name="fullName" placeholder="Enter your full name"/><br />
        Username:<br />
        <input type="text" name="username" placeholder="Enter your username"/><br />
        Password:<br />        
        <input type="password" name="password" placeholder="Enter password"/><br />
        Confirm password:  <br />       
        <input type="password" name="passwordConfirm" placeholder="Confirm password"/><br /><br /> 

        <div class="error"><?php echo $errors;?></div>
        <input type="submit" value="Register"/><br /><br />
        Already have an account? Please <a href="index.php?page=login">login</a> here.
    </form>

</div>
