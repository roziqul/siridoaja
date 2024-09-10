<section class="section">
    <div class="section-header">
        <h1>PBB-P2 Kecamatan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Pembayaran PBB-P2</div>
            <div class="breadcrumb-item">PBB-P2 Kecamatan</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form class="form-inline mb-4" onsubmit="loadData(event)">
                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                        <select id="tahun" name="tahun" class="form-control" style="width: 150px;">
                            <option value="" selected disabled>Pilih tahun...</option>
                            <?php
                            // Buat pilihan tahun dari 2010 hingga tahun sekarang
                            $currentYear = date("Y");
                            for ($year = 2010; $year <= $currentYear; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fa fa-recycle"></i>
                        TAMPILKAN
                    </button>
                    <div class="form-group ml-auto">
                        <div class="selectgroup w-100">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="200" class="selectgroup-input">
                                <span class="selectgroup-button">BUKU 1,2,3</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="50" class="selectgroup-input">
                                <span class="selectgroup-button">BUKU 4,5</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="100" class="selectgroup-input" checked="">
                                <span class="selectgroup-button">SEMUA</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="150" class="selectgroup-input">
                                <span class="selectgroup-button">CUSTOM</span>
                            </label>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">KODE</th>
                                <th class="text-center">KECAMATAN</th>
                                <th class="text-center">PBB</th>
                                <th class="text-center">BAYAR</th>
                                <th class="text-center">(%)</th>
                                <th class="text-center">KURANG BAYAR</th>
                                <th class="text-center">SPPT</th>
                                <th class="text-center">DIBAYAR</th>
                                <th class="text-center">SISA SPPT</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <h5>
                        Pagu PBB : 40.000.000.000
                        <i class="fa fa-long-arrow-alt-right"></i>
                        Realisasi PBB : 20.000.000.000
                    </h5>
                </div>
            </div>
        </div>
</section>

<script>
    function initTable(destroyOnly = false, id = "#table-1") {
        if ($.fn.DataTable.isDataTable(id)) {
            $(id).DataTable().destroy();
        }

        if (!destroyOnly) {
            $(id).DataTable({
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
            });
        }
    }
    initTable();

    function loadData(evt) {
        var tahun = evt.target.elements.tahun.value;
        initTable(true);

        if (!tahun) {
            // Jika tahun tidak dipilih, tampilkan SweetAlert peringatan
            Swal.fire({
                title: 'SIRIDOAJA',
                text: 'Tahun tidak boleh kosong!',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            });

            evt.preventDefault(); // Mencegah form untuk di-submit
            return;
        }

        evt.preventDefault();
        $('#loader').fadeIn();

        $('#table-1>tbody').empty();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d1.php",
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var tableStr = "";
                for (let i = 0; i < res.length; i++) {
                    const e = res[i];
                    tableStr += "<tr>"
                    for (let j = 0; j < e.length; j++) {
                        const ej = e[j];
                        tableStr += "<td>"
                        tableStr += ej
                        tableStr += "</td>"
                    }
                    tableStr += "</tr>"
                }
                $('.jml-tgl').text(res.length)
                $('#table-1>tbody:last-child').append(tableStr);

                initTable();

            },
            complete: function() {
                // Hide loader after data is loaded
                $('#loader').fadeOut();
            }
        });
    }
</script>