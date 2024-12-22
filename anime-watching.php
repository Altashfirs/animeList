<?php
include 'component/header.php';
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        include 'php/conn.php';
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.jikan.moe/v4/anime/$id/videos",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10, // Set timeout to prevent long waits
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $animeJson = json_decode($response, true);

        if (isset($animeJson['data'])) {
            $episodes = $animeJson['data']['episodes'] ?? [];
            $promo = $animeJson['data']['promo'] ?? [];

            // Ambil promo pertama (atau bisa disesuaikan dengan logika lain)
            $promoVideo = !empty($promo) ? $promo[0]['trailer'] : null;
            $promoTitle = !empty($promo) && isset($promo[0]['title']) ? htmlspecialchars($promo[0]['title']) : 'Trailer'; // Periksa keberadaan title
            ?>

            <!-- Anime Section Begin -->
            <section class="anime-details spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="anime__video__player">
                                <div class="anime__details__title">
                                    <h3 class="text-light">Trailer : <?= $promoTitle ?></h3>
                                </div>
                                <?php if ($promoVideo) { ?>
                                    <iframe width="100%" height="400" src="<?= htmlspecialchars($promoVideo['embed_url']); ?>"
                                        frameborder="0" allowfullscreen></iframe>
                                <?php } else { ?>
                                    <p>Trailer tidak tersedia</p>
                                <?php } ?>
                            </div>
                            <div class="anime__details__episodes">
                                <div class="section-title">
                                    <h5>List Episode</h5>
                                </div>
                                <?php if (empty($episodes)) { ?>
                                    <center>
                                        <p>Episode tidak tersedia</p>
                                    </center>
                                <?php } else { ?>
                                    <?php foreach ($episodes as $episode) { ?>
                                        <?php if (!empty($episode['url'])) { ?>
                                            <a href="<?= htmlspecialchars($episode['url']); ?>">Ep.
                                                <?= htmlspecialchars($episode['mal_id']); ?></a>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Anime Section End -->
            <?php include "component/footer.php";
        }
    }
} else {
    header("location: login.php?pesan=Anda belum login!");
}
?>