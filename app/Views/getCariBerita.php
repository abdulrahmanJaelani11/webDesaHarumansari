    <div class="row g-5">
        <?php if (count($berita) > 0) : ?>
            <?php foreach ($berita as $row) : ?>
                <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="<?= base_url("assetsAdmin"); ?>/img/<?= $row['img']; ?>" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Berita</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= $row['penulis']; ?></small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i><?= $row['tanggal']; ?></small>
                            </div>
                            <h4 class="mb-3"><?= $row['judul']; ?></h4>
                            <a class="text-uppercase" href="<?= base_url("detail/" . $row['id']); ?>">Lihat <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h1>Belum Ada Berita</h1>
        <?php endif ?>
    </div>