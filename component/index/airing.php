<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.jikan.moe/v4/top/anime?limit=12&filter=airing&type=tv',
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

<div class="live__product">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="section-title">
                <h4>Airing Now</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
        </div>
    </div>
    <div class="row">
        <?php include 'data_index.php' ?>
    </div>