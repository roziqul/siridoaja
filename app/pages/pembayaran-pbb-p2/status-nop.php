<section class="section">
    <div class="section-header">
        <h1>Status NOP</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Status NOP</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <form class="card" onsubmit="loadData(event)" onreset="clearTable()">
                    <div class="card-header">
                        <h4>Cek Status Pembayaran</h4>
                    </div>

                    <div class="card-footer text-right">
                        <form class="form-inline mb-4" onsubmit="loadData(event)">
                            <div class="input-group mb-2" style="width: 100%;">
                                <div class="form-inline mr-auto">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">NOP.</span>
                                    </div>
                                    <input type="text" name="nop" id="nop" class="form-control" title="nop" style="width: 300px;">
                                    <div class="input-group-prepend ml-2">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <select id="tahun" name="tahun" class="form-control">
                                        <option value="" selected>SEMUA TAHUN</option>
                                        <?php
                                        // Buat pilihan tahun dari 2010 hingga tahun sekarang
                                        $currentYear = date("Y");
                                        for ($year = 2010; $year <= $currentYear; $year++) {
                                            echo "<option value=\"$year\">$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-inline ml-auto">
                                    <button type="submit" class="btn btn-icon icon-left btn-primary mr-2">
                                        <i class="fa fa-search"></i>
                                        Cari Data
                                    </button>
                                    <button type="reset" class="btn btn-icon icon-left btn-warning">
                                        <i class="fa fa-backspace"></i>
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>History Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">TAHUN</th>
                                    <th class="text-center">TEMPO</th>
                                    <th class="text-center">PBB</th>
                                    <th class="text-center">TANGGAL</th>
                                    <th class="text-center">DENDA</th>
                                    <th class="text-center">JUMLAH</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi SPPT</h4>
                    </div>
                    <div class="card-body">
                        <strong>
                            <em>
                                Informasi Subyek Pajak
                            </em>
                        </strong>
                        <table class="table table-striped table-sm table-bordered mb-5">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama WP.</th>
                                    <td colspan="5" id="nama_wp" style="width: 70%;">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat WP.</th>
                                    <td colspan="5" id="alamat_wp">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Blok.</th>
                                    <td id="blok_wp">-</td>
                                    <th scope="row">RT.</th>
                                    <td id="rt_wp">-</td>
                                    <th scope="row">RW.</th>
                                    <td id="rw_wp">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td colspan="5" id="kel_wp">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kota</th>
                                    <td colspan="5" id="kota_wp">-</td>
                                </tr>
                            </tbody>
                        </table>

                        <strong>
                            <em>
                                Informasi Obyek Pajak
                            </em>
                        </strong>
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td colspan="5" id="alamat_op" style="width: 70%;">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Persil</th>
                                    <td id="persil_op">-</td>
                                    <th scope="row">RT.</th>
                                    <td id="rt_op">-</td>
                                    <th scope="row">RW.</th>
                                    <td id="rw_op">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td colspan="5" id="kel_op">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kecamatan</th>
                                    <td colspan="5" id="kec_op">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luas Bumi</th>
                                    <td colspan="5" id="bumi_op">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Luas Bangunan</th>
                                    <td colspan="5" id="bang_op">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
            return $(id).DataTable({
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
            });
        }
    }
    initTable();

    $(function(){
        $("#nop").inputmask("35.05.999.999.999.999.0");
    });

    function subjTable() {
        $('#nama_wp').text('-');
        $('#alamat_wp').text('-');
        $('#blok_wp').text('-');
        $('#kel_wp').text('-');
        $('#kota_wp').text('-');
    }

    function objTable() {
        $('#alamat_op').text('-');
        $('#persil_op').text('-');
        $('#kel_op').text('-');
        $('#kec_op').text('-');
        $('#bumi_op').text('-');
        $('#bang_op').text('-');
    }

    function loadData(evt) {
        var tahun = evt.target.elements.tahun.value;
        var nop = evt.target.elements.nop.value;
        initTable(true);

        if (!nop) {
            // Jika tahun tidak dipilih, tampilkan SweetAlert peringatan
            Swal.fire({
                title: 'SIRIDOAJA',
                text: 'NOP tidak boleh kosong!',
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

        subjTable();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d6.php",
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var subyek = Object.keys(res.subyek);
                for (let i = 0; i < subyek.length; i++) {
                    const el = subyek[i];
                    if (el && res.subyek[subyek[i]]) {
                        $('#' + el).text(res.subyek[subyek[i]])
                    }
                }
            }
        });

        objTable();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d6.php",
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var obyek = Object.keys(res.obyek);
                for (let i = 0; i < obyek.length; i++) {
                    const el = obyek[i];
                    if (el && res.obyek[obyek[i]]) {
                        $('#' + el).text(res.obyek[obyek[i]])
                    }
                }
            }
        });

        $('#table-1>tbody').empty();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d5.php",
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
                var table = initTable();

                new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        'print'
                    ]
                }).container().appendTo($('#table-1_wrapper .col-md-6:eq(0)'));

            },
            complete: function() {
                // Hide loader after data is loaded
                $('#loader').fadeOut();
            }
        });
    }
</script>