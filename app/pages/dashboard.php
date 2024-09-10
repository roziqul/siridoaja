<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Dashboard</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Jumlah Penerimaan PBB-P2 (Rupiah)</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chart_p2_rp"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4>Jumlah Penerimaan PBB-P2 (Lembar SPPT)</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chart_p2_sppt"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4>Indeks Kepuasan Wajib Pajak</h4>
                            </div>
                            <div class="card-body d-flex align-items-center">
                                <canvas id="chart_kwp"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    "use strict";

    var ctx = document.getElementById("chart_p2_rp").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
                label: 'Statistics',
                data: [460, 458, 330, 502, 430, 610, 488],
                borderWidth: 2,
                backgroundColor: '#12A86B',
                borderColor: '#12A86B',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 150
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false
                    },
                    gridLines: {
                        display: false
                    }
                }]
            },
        }
    });

    var ctx = document.getElementById("chart_p2_sppt").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [20, 30, 70, 80, 100, 110, 120, 130, 140, 150, 160, 190, 200, 210, 220],
            datasets: [{
                label: 'Jumlah Penerimaan PBB-P2 (Lembar SPPT)',
                data: [20, 15, 5, 5, 10, 8, 10, 90, 20, 80, 10, 20, 8, 20, 40],
                borderWidth: 2,
                backgroundColor: '#12A86B',
                borderColor: '#12A86B',
                borderWidth: 2.5,
                pointBackgroundColor: '#ffffff',
                pointRadius: 4
            }]
        },
    });

    var ctx = document.getElementById("chart_kwp").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    120,
                    80,
                    40,
                    30,
                ],
                backgroundColor: [
                    '#AAFF00',
                    '#FFEA00',
                    '#FF5733',
                    '#C41E3A',
                ],
                label: 'Dataset 1'
            }],
            labels: [
                'Sangat Baik',
                'Baik',
                'Kurang Baik',
                'Tidak Baik'
            ],
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
        }
    });
</script>