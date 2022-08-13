<div class="content">
    
    <form action="index.php?page=login" method="POST">
        Username:<br />
        <input type="text" name="username" placeholder="Enter your username"/><br />
        Password:<br />        
        <input type="password" name="password" placeholder="Enter password"/><br />
        <div class="error"><?php echo $errors;?></div>
        <input type="submit" value="Login"/><br /><br />
        Need an account? Please <a href="index.php?page=register">register</a> here.
    </form>

</div>
