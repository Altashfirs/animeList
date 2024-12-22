<div class="row">
    <div class="col-lg-8 col-md-8">
        <div class="anime__details__review">
            <div class="section-title">
                <h5>Reviews</h5>
            </div>
            <?php
            $query = "SELECT comments.id_comment, comments.comment, users.username FROM comments JOIN users ON comments.id_user = users.id_user WHERE mal_id = $id";
            $respon = mysqli_query($conn, $query);

            if (mysqli_num_rows($respon) >= 1) {
                while ($rows = mysqli_fetch_assoc($respon)) { ?>
                    <div class="anime__review__item">
                        <div class="anime__review__item__pic">
                            <img src="resources/img/anime/review-1.jpg" alt="">
                        </div>
                        <div class="anime__review__item__text">
                            <h6><?= $rows['username'] ?></h6>
                            <p><?= $rows['comment'] ?></p>
                            <?php if ($rows['username'] === $_SESSION['username']) { ?>
                                <a href="./php/proses_hapus_comment.php?id=<?= $rows['id_comment'] ?>&mal_id=<?= $id ?>"><i class="fa fa-trash"></i></a>
                                <a href="#" class="edit-comment" data-id="<?= $rows['id_comment'] ?>" data-comment="<?= htmlspecialchars($rows['comment'], ENT_QUOTES) ?>"><i class="fa fa-pencil-square-o"></i></a>

                                <!-- Form untuk mengedit komentar -->
                                <form action="./php/proses_edit_comment.php" method="POST" style="display: none;" class="edit-form" id="edit-form-<?= $rows['id_comment'] ?>">
                                    <textarea name="edit_comment" id="edit_comment_<?= $rows['id_comment'] ?>" required><?= htmlspecialchars($rows['comment'], ENT_QUOTES) ?></textarea>
                                    <input type="hidden" name="id" value="<?= $rows['id_comment'] ?>">
                                    <input type="hidden" name="mal_id" value="<?= $id ?>">
                                    <button type="submit">Save</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <center>
                    <p>Be the first to comment!</p>
                </center>
            <?php } ?>
        </div>
        <div class="anime__details__form">
            <div class="section-title">
                <h5>Your Comment</h5>
            </div>
            <form action="php/proses_tambah_comment.php" method="POST" class="form__edit__comment">
                <textarea placeholder="Your Comment" name="comment" required></textarea>
                <input type="hidden" name="mal_id" value="<?= $id ?>">
                <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editLinks = document.querySelectorAll('.edit-comment');

            editLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const commentId = this.getAttribute('data-id');

                    // Tampilkan form edit
                    const editForm = document.getElementById(`edit-form-${commentId}`);
                    editForm.style.display = 'block'; // Tampilkan form
                });
            });
        });
    </script>
</div>