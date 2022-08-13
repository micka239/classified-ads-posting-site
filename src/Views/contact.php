<div class="container">
    <div class="about-us">
        <div class="contact-text">
            <h1>Let's chat. </br> Tell us about your problem. </h1>
            <p>Let's solve something together 🤟</p>
        </div>

        <div class="form">
            <p>Send us a message🚀</p>
            <form action="index.php?page=contact" method="POST">
                Name:<br />
                <input class="contact-name" type="text" name="name" placeholder="Enter name"/><br />  
                Message:<br />
                <textarea class="contact-message" name="message" placeholder="Enter text message " class="new-ad"></textarea><br />
                
                <div class="error"><?php echo $errors;?></div>
                
                <input id="send" type="submit" value="Send"/><br />
            </form>


        </div>
    </div>
</div>