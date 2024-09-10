<section class="section">
    <div class="section-header">
        <h1>Realisasi Harian</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Realisasi Harian</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
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
                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <label class="text-center">KECAMATAN &nbsp</label>
                            </div>
                        </div>
                        <select id="kecamatan" name="kecamatan" class="form-control">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary ml-auto">
                        <i class="fa fa-recycle"></i>
                        TAMPILKAN
                    </button>
                </form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">KECAMATAN</th>
                                        <th class="text-center">TAHUN</th>
                                        <th class="text-center">REALISASI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">KECAMATAN</th>
                                        <th class="text-center">KELURAHAN</th>
                                        <th class="text-center">TAHUN</th>
                                        <th class="text-center">REALISASI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
    $('.tanggal').daterangepicker({
        locale: {
            format: 'DD-MM-YYYY'
        },
        singleDatePicker: true,
    });

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

    function fetchKecamatanOptions() {
        $.ajax({
            url: "base-data.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                if (data && data.length > 0) {
                    var kecamatanSelect = $("#kecamatan");
                    var kelurahanSelect = $("#kelurahan");
                    kecamatanSelect.empty();
                    kelurahanSelect.empty();

                    var defaultOption = $("<option selected>").val("").text("Pilih kecamatan...");
                    kecamatanSelect.append(defaultOption);

                    // Loop through the data to populate kecamatan options
                    for (var i = 0; i < data.length; i++) {
                        var kecamatan = data[i].val;
                        var kecamatanOption = $("<option>").val(data[i].id).text(kecamatan);
                        kecamatanSelect.append(kecamatanOption);
                    }

                } else {
                    console.error("Invalid or empty response for kecamatan options");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error fetching kecamatan options:", status, error);
            }
        });
    }

    fetchKecamatanOptions();

    function loadData(evt) {
        var tgl = evt.target.elements.tanggal.value;
        initTable(true);
        initTable(true, '#table-2');

        evt.preventDefault();
        $('#loader').fadeIn();

        $('#table-1>tbody').empty();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d3.php",
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

        $('#table-2>tbody').empty();
        $.ajax({
            url: "dummy/pembayaran-pbb-p2/pembayaran-d4.php",
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
                $('#table-2>tbody:last-child').append(tableStr);
                initTable(false, '#table-2');

            },
            complete: function() {
                // Hide loader after data is loaded
                $('#loader').fadeOut();
            }
        });
        $('#loader').fadeOut();
    }
</script>