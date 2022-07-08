<?= $this->extend('template/umum'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <canvas id="myChart"></canvas>
    </div>
</div>
<hr>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Usia</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($dataKelompokUsia as $row) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $row['usia']; ?></td>
                <td><?= $row['jumlah']; ?> Orang</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script src="<?= base_url("assets"); ?>/js/chart.js"></script>
<script>
    function getDataKelomUsia() {
        $.ajax({
            url: "<?= base_url("proses/getDataKelomUsia"); ?>",
            type: "post",
            dataType: 'json',
            success: function(data) {
                console.log(data)
                let atribut = data.usia
                let jumlah = data.jumlah
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: atribut,
                        datasets: [{
                            label: '# of Votes',
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
    getDataKelomUsia()
</script>
<?= $this->endSection(); ?>