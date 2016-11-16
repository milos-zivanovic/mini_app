<div class="card card-container">
    <img src="img/button.png" class="button" height="15px" />
    <img id="profile-img" class="profile-img-card" src="img/user-avatar.png" />
    <?php if (isset($_GET['err']) && !empty($_GET['err'])) : ?>
        <div class="alert alert-danger">Error: <?php echo str_replace("-", " ", $_GET['err']); ?></div>
    <?php endif; ?>
    <form class="form-signin" action="process-registration.php" method="post">
        <input type="text" name="first_name" class="form-control" placeholder="First Name" required autofocus />
        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required />
        <input type="email" name="email" class="form-control" placeholder="Email address" required />
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <input type="password" name="rpt_password" class="form-control" placeholder="Repeat password" required />
        <input type="submit" name="register" class="btn btn-lg btn-primary btn-block btn-signin" value="Register" />
    </form>
</div>