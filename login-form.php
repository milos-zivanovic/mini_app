<div class="card card-container">
    <img src="img/button.png" class="button" height="15px" />
    <img id="profile-img" class="profile-img-card" src="img/user-avatar.png" />
    <?php if (isset($_GET['err']) && !empty($_GET['err'])) : ?>
        <div class="alert alert-danger">Error: <?php echo str_replace("-", " ", $_GET['err']); ?></div>
    <?php endif; ?>
    <?php if (isset($_GET['register']) && $_GET['register'] == true) : ?>
        <div class="alert alert-success">Your registration is finished. Now you can log in with your data.</div>
    <?php endif; ?>
    <form class="form-signin" action="process-login.php" method="post">
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus />
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <input type="submit" name="login" class="btn btn-lg btn-primary btn-block btn-signin" value="Login" />
    </form>
</div>