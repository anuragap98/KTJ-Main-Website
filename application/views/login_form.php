
<div id="form">
<section class="hero is-dark">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">Login Here</h1>
        </div>
    </div>
</section>
<?php if(isset($message)):?>
<article class="message">
    <div class="message-header">
        <p>Message</p>
        <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
        <?= $message; ?>
    </div>
</article>
<?php endif;?>
<?php
echo validation_errors();
echo form_open('login'); ?>
    <div>
    <label for="email">Email</label><br>
    <input id ="email" type="email" name="email" class="input">
    </div>
    <div>
    <label for="password">Password</label><br>
    <input type="password" name="password" class="input">
    </div>
    <div class="btn">
    <input type="submit" value="Login" name="submit" class="button is-primary">
    </div>
</form>
<br>
<div >
    <a href="<?= site_url() ?>passwordreset">Forgot Password</a>
</div>
</div>