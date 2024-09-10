<section class="section">
    <div class="section-header">
        <h1>Pelayanan PBB P2</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Pelayanan PBB P2</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <form class="form-inline mb-4" onsubmit="loadData(event)">
                                    <label>Tanggal :</label>
                                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="tanggal" class="form-control tanggal">
                                    </div>
                                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                                        <i class="fa fa-search"></i>
                                        Cari Data
                                    </button>
                                </form>
                            </div>
                            <div class="col-12 col-md-4 d-none d-md-flex align-self-end">
                                <p class="h5">Rekapitulasi</p>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    BENDEL
                                                </th>
                                                <th class="text-center">
                                                    URUT
                                                </th>
                                                <th class="text-center">
                                                    PEMOHON
                                                </th>
                                                <th class="text-center">
                                                    ALAMAT
                                                </th>
                                                <th class="text-center">
                                                    KETERANGAN
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 d-md-none d-block">
                                <p class="h6">Jumlah per Tanggal: <span class="jml-tgl">0</span> Orang</p>
                            </div>
                            <div class="col-12 col-md-4 d-md-none d-block">
                                <p class="h5">Rekapitulasi</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-2">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    KECAMATAN
                                                </th>
                                                <th class="text-center">
                                                    JUMLAH
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 d-none d-md-block">
                                <p class="h6">Jumlah per Tanggal: <span class="jml-tgl">0</span> Orang</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="h6">Jumlah Total: <span class="jml-total">0</span> Orang</p>
                            </div>
                        </div>
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
            $(id).DataTable({
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
            });
        }
    }
    initTable();
    initTable(false, '#table-2');

    $('.tanggal').daterangepicker({
        locale: {
            format: 'DD-MM-YYYY'
        },
        singleDatePicker: true,
    });

    function loadData(evt) {
        var tgl = evt.target.elements.tanggal.value;
        initTable(true);
        initTable(true, '#table-2');

        evt.preventDefault();
        $('#loader').fadeIn();

        $('#table-1>tbody').empty();
        $.ajax({
            url: "dummy/pelayanan-pbb-p2/pelayanan-d1.php",
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
            }
        });

        $('#table-2>tbody').empty();
        $.ajax({
            url: "dummy/pelayanan-pbb-p2/pelayanan-d2.php",
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
                $('.jml-total').text(res.length)
                $('#table-2>tbody:last-child').append(tableStr);
                initTable(false, "#table-2");
            }
        });
        $('#loader').fadeOut();
    }
</script>