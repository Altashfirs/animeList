<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.jikan.moe/v4/anime/$id/episodes",
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
    ?>

    <div class="anime__details__episodes">
        <div class="section-title">
            <h5>List Name</h5>
        </div>
        <?php if (empty($animeJson['data'])) { ?>
            <center>
                <p>Episode tidak tersedia</p>
            </center>
        <?php } else { ?>
            <?php foreach ($animeJson['data'] as $episode) { ?>
                <?php if (!empty($episode['url'])) {
                    ?>
                    <a href="<?= htmlspecialchars($episode['url']); ?>">Ep.
                        <?= htmlspecialchars($episode['mal_id']); ?></a>
                <?php } ?>
            <?php } ?>
        <?php }
} ?>
</div>