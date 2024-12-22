<?php
include 'component/header.php';
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        include 'php/conn.php';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.jikan.moe/v4/anime/$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $animeJson = json_decode($response, true);
        if (isset($animeJson['data'])) {
            $data = $animeJson['data'];
            ?>
            <!-- Anime Section Begin -->
            <section class="anime-details spad">
                <div class="container">
                    <div class="anime__details__content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="anime__details__pic set-bg"
                                    data-setbg="<?= $data['images']['jpg']['large_image_url'] ?>">
                                    <div class="comment"><i class="fa fa-line-chart"></i> <?= $data['rank'] ?></div>
                                    <div class="view"><i class="fa fa-heart"></i> <?= $data['favorites'] ?></div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="anime__details__text">
                                    <div class="anime__details__title">
                                        <h3><?= $data['title_english'] ?></h3>
                                        <span><?= $data['title_japanese'] ?></span>
                                    </div>
                                    <p>
                                        <?= $data['synopsis'] ?>
                                    </p>
                                    <div class="anime__details__widget">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <ul>
                                                    <li><span>Type:</span> <?= $data['type'] ?></li>
                                                    <li><span>Studios:</span>
                                                        <?php $studioName = array_map(function ($studio) {
                                                            return htmlspecialchars($studio['name']);
                                                        }, $data['studios']);
                                                        echo implode(", ", $studioName); ?>
                                                    </li>
                                                    <li><span>First aired:</span>
                                                        <?php
                                                        // Misalkan $data['aired']['from'] dan $data['aired']['to'] adalah string tanggal dengan waktu
                                                        $airedFrom = $data['aired']['from'];

                                                        // Menggunakan DateTime untuk memformat tanggal
                                                        $fromDate = new DateTime($airedFrom);
                                                        echo $fromDate->format('Y-m-d');
                                                        ?>
                                                    </li>
                                                    <li><span>Status:</span> <?= $data['status'] ?></li>
                                                    <li><span>Genre:</span>
                                                        <?php $genreName = array_map(function ($genre) {
                                                            return htmlspecialchars($genre['name']);
                                                        }, $data['genres']);
                                                        echo implode(", ", $genreName); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul>
                                                    <li><span>Scores:</span> <?= $data['score'] ?></li>
                                                    <li><span>Rating:</span> <?= $data['rating'] ?></li>
                                                    <li><span>Duration:</span> <?= $data['duration'] ?></li>
                                                    <li><span>Episodes:</span> <?= $data['episodes'] ?></li>
                                                    <li><span>Popularity:</span> <?= $data['popularity'] ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="anime__details__btn">
                                        <a href="anime-watching.php?id=<?= $data['mal_id'] ?>" class="watch-btn"><span>Watch
                                                Now</span> <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    include 'component/review.php';
                    include 'component/like.php';
                    ?>

                </div>
                </div>
            </section>
            <!-- Anime Section End -->

            <?php
            include 'component/footer.php';
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: login.php?pesan=Anda belum login!");
}
?>