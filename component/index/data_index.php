<?php
foreach ($animeJson['data'] as $data) {
    if (empty($data['title_english'])) {
        continue;
    }
    ?>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg"
                data-setbg="<?= htmlspecialchars($data['images']['jpg']['large_image_url'] ?? ''); ?>">
                <div class="ep"><?= htmlspecialchars($data['score'] ?? 'N/A'); ?> / 10</div>
                <div class="view"><i class="fa fa-heart"></i><?= htmlspecialchars($data['favorites'] ?? 'N/A'); ?></div>
            </div>
            <div class="product__item__text">
                <ul>
                    <li><?= htmlspecialchars($data['type'] ?? 'N/A'); ?></li>
                    <li><?= htmlspecialchars($data['status'] ?? 'N/A'); ?></li>
                </ul>
                <h5><a
                        href="anime-details.php?id=<?= htmlspecialchars($data['mal_id'] ?? ''); ?>"><?= htmlspecialchars($data['title_english']); ?></a>
                </h5>
            </div>
        </div>
    </div>
<?php } ?>