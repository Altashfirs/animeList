<?php
include 'component/header.php';
?>

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Register</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Register</h3>
                    <form action="php/proses_regist.php" method="POST">
                        <div class="input__item">
                            <input type="email" name="email" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" name="username" placeholder="Username">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input type="password" name="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" name="regist" class="site-btn">Regist Now</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Already have an account?</h3>
                    <a href="login.php" class="primary-btn">Login Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->

<?php
include 'component/footer.php';
?>