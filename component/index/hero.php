<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime?limit=3&page=6',
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

?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach ($animeJson['data'] as $data) { ?>
                <div class="hero__items set-bg" data-setbg="<?= $data['images']['jpg']['large_image_url']; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <h2><?= $data['title_english']; ?></h2>
                                <a href="anime-details.php?id=<?= $data['mal_id']; ?>"><span>Anime Details</span> <i
                                        class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Hero Section End -->