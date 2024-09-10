<style>
    /* Add this CSS to your existing styles or in a <style> tag in the head section */
    #table-1 thead th {
        white-space: nowrap;
    }
</style>

<section class="section">
    <div class="section-header">
        <h1>Pajak Restoran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Pajak Daerah Lain</div>
            <div class="breadcrumb-item">Pajak Restoran</div>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form class="form-inline mb-4 d-flex" onsubmit="loadData(event)">
                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                        <label style="margin-right:10px;">Tanggal :</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control daterange-cus">
                    </div>
                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <label class="text-center mb-0">KECAMATAN &nbsp</label>
                            </div>
                        </div>
                        <select id="kecamatan" name="kecamatan" class="form-control">
                            <!-- Options will be dynamically populated using JavaScript -->
                        </select>
                    </div>
                    <div class="input-group mx-0 mx-md-2 mb-3 mb-md-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <label class="text-center mb-0">KELURAHAN &nbsp</label>
                            </div>
                        </div>
                        <select id="kelurahan" name="kelurahan" class="form-control">
                            <!-- Options will be dynamically populated using JavaScript -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-icon icon-left btn-primary ml-auto">
                        <i class="fa fa-recycle"></i>
                        CARI DATA
                    </button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr style="font-size: 12px;">
                                <th class="text-center">TANGGAL</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">NAMA PEMILIK</th>
                                <th class="text-center">NAMA USAHA</th>
                                <th class="text-center">KODE BILLING</th>
                                <th class="text-center">ALAMAT OBJEK</th>
                                <th class="text-center">KEL / DESA</th>
                                <th class="text-center">KECAMATAN</th>
                                <th class="text-center">MULAI</th>
                                <th class="text-center">SAMPAI</th>
                                <th class="text-center">NILAI</th>
                                <th class="text-center">(%)</th>
                                <th class="text-center">PAJAK</th>
                                <th class="text-center">BLN</th>
                                <th class="text-center">MASA</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <form class="form-inline mb-4 mt-4 d-flex">
            <div class="form-group ml-auto mr-auto">
                <div class="selectgroup w-100">
                    <label class="mr-2">Opsi Cetak :</label>
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="200" class="selectgroup-input" checked="">
                        <span class="selectgroup-button">PDF</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="value" value="50" class="selectgroup-input">
                        <span class="selectgroup-button">HTML</span>
                    </label>
                    <button type="submit" class="btn btn-icon icon-left btn-primary ml-2">
                        <i class="fa fa-print"></i>
                        CETAK
                    </button>
                    <button type="submit" class="btn btn-icon icon-left btn-primary ml-2">
                        <i class="fa fa-reply"></i>
                        CLOSE
                    </button>
                </div>

            </div>
        </form> -->

    </div>
</section>

<script>
    function initTable(settings = {
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
            }, destroyOnly = false, id = "#table-1") {
        if ($.fn.DataTable.isDataTable(id)) {
            $(id).DataTable().destroy();
        }

        if (!destroyOnly) {
            return $(id).DataTable(settings);
        }
    }
    initTable();

    $('.daterange-cus').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        drops: 'down',
        opens: 'right'
    });
    $('.daterange-btn').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
    }, function(start, end) {
        $('.daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    });

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

                    // Trigger event when kecamatan selection changes
                    kecamatanSelect.on("change", function() {
                        var selectedKecamatanId = $(this).val();
                        fetchKelurahanOptions(selectedKecamatanId);
                    });

                    // Trigger fetch kelurahan options for the initial selected kecamatan
                    var initialSelectedKecamatanId = kecamatanSelect.val();
                    fetchKelurahanOptions(initialSelectedKecamatanId);
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

    function fetchKelurahanOptions(selectedKecamatanId) {
        $.ajax({
            url: "base-data.php",
            type: "GET",
            dataType: "json",
            data: {
                kel: selectedKecamatanId
            },
            success: function(data) {
                if (data && data.length > 0) {
                    var kelurahanSelect = $("#kelurahan");
                    kelurahanSelect.empty();

                    var defaultOption = $("<option selected>").val("").text("Pilih kelurahan...");
                    kelurahanSelect.append(defaultOption);

                    // Loop through the data to populate kelurahan options
                    for (var i = 0; i < data.length; i++) {
                        var kelurahanId = data[i].kel;
                        for (var i = 0; i < kelurahanId.length; i++) {
                            var kelurahan = kelurahanId[i].val;
                            var kelurahanOption = $("<option>").val(kelurahanId).text(kelurahan);
                            kelurahanSelect.append(kelurahanOption);
                        }
                    }
                } else {
                    console.error("Invalid or empty response for kelurahan options");
                }

                console.log(kelurahan);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching kelurahan options:", status, error);
            }
        });
    }

    function loadData(evt) {
        initTable({
                searching: false,
                info: false,
                lengthChange: false,
                paging: false,
            }, true);

        evt.preventDefault();
        $('#loader').fadeIn();

        $('#table-1>tbody').empty();
        $.ajax({
            url: "dummy/pajak-daerah-lain/data-restoran.php",
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

                var table = initTable({
                    searching: false,
                    info: false,
                    lengthChange: false,
                    paging: false,
                    buttons: [
                        'pdf'
                    ],

                    createdRow: function(row, data, dataIndex) {
                        var kodeValue = data[4]; // Assuming the KODE BILLING is at index 4
                        var kecamatanValue = data[7]; // Assuming the KECAMATAN is at index 7

                        if (kodeValue) {
                            $('td', row).css('text-align', 'center');
                        }

                        if (kecamatanValue) {
                            $('td', row).css('text-align', 'left');
                        }
                    }
                });

                new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }).container().appendTo($('#table-1_wrapper .col-md-6:eq(0)')); // Adjust the container placement as needed
            },
            complete: function() {
                // Hide loader after data is loaded
                $('#loader').fadeOut();
            }
        });
    }
</script>