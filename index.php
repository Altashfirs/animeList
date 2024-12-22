<?php
include 'component/header.php';
include 'component/index/hero.php';

if (isset($_GET['search'])) { ?>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    include 'component/index/search.php';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
<?php } else { ?>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    include 'component/index/airing.php';
                    include 'component/index/favorite.php';
                    include 'component/index/popular.php';
                    include 'component/index/upcoming.php';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
<?php }
include 'component/footer.php';
?>