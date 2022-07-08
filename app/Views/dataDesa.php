<?= $this->extend('template/umum'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-6">
        <?php foreach ($dataDesa2 as $row) : ?>
            <p style="line-height: 15px;"><?= $row['atribut']; ?> : <?= $row['jumlah']; ?></p>
        <?php endforeach; ?>
    </div>
    <hr>
    <div class="col-12">
        <canvas id="myChart"></canvas>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/chart.js"></script>
<script>
    function getDataDesa() {
        $.ajax({
            url: "<?= base_url("proses/getDataDesa"); ?>",
            type: "post",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                let atribut = data.atribut
                let jumlah = data.jumlah
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: atribut,
                        datasets: [{
                            label: '# Data',
                            data: jumlah,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    }
    $(document).ready(function() {
        getDataDesa()
    })
</script>
<?= $this->endSection(); ?>