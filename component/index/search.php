<?php
$search = $_GET['search'];
$searchEncode = urlencode($search);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.jikan.moe/v4/anime?q=$searchEncode&limit=24&sfw=false",
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
                <h4>Search "<?= $search ?>"</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <?php include 'data_index.php' ?>
    </div>