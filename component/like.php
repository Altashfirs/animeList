<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime?limit=3&page=2',
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

<div class="col-lg-4 col-md-4">
    <div class="anime__details__sidebar">
        <div class="section-title">
            <h5>you might like...</h5>
        </div>
        <?php foreach ($animeJson['data'] as $data) { ?>
            <div class="product__sidebar__view__item set-bg" data-setbg="<?= $data['images']['jpg']['large_image_url']; ?>">
                <div class="ep"><?= $data['score']; ?></div>
                <div class="view"><i class="fa fa-heart"></i> <?= $data['favorites']; ?></div>
                <h5><a href="anime-details.php?id=<?= $data['mal_id']; ?>"><?= $data['title_english']; ?></a></h5>
            </div>
        <?php } ?>
    </div>
</div>