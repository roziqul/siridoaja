<section class="section">
    <div class="section-header">
        <h1>Status Pelayanan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#" onclick="loadPage('dashboard.php')">Dashboard</a></div>
            <div class="breadcrumb-item">Status Pelayanan</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <form class="card" onsubmit="loadData(event)" onreset="clearTable()">
                    <div class="card-header">
                        <h4>Cek Status Pelayanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">No. Pelayanan</span>
                            </div>
                            <input type="text" name="tahun" class="form-control" placeholder="Tahun" title="Tahun" required>
                            <input type="text" name="bendel" class="form-control" placeholder="Bendel" title="Bendel" required>
                            <input type="text" name="urut" class="form-control" placeholder="No. Urut" title="No. Urut" required>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-icon icon-left btn-primary mr-2">
                            <i class="fa fa-search"></i>
                            Cari Data
                        </button>
                        <button type="reset" class="btn btn-icon icon-left btn-warning">
                            <i class="fa fa-backspace"></i>
                            Batal
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pemohon</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama Pemohon</th>
                                    <td width="70%" id="nama">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat Pemohon</th>
                                    <td width="70%" id="alamat">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat Objek</th>
                                    <td width="70%" id="alamat_obj">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kelurahan</th>
                                    <td width="70%" id="kel">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kecamatan</th>
                                    <td width="70%" id="kec">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Keperluan</th>
                                    <td width="70%" id="keperluan">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kategori</th>
                                    <td width="70%" id="kategori">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Informasi Pelayanan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-sm table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row">No. Surat Permohonan</th>
                                    <td width="60%" id="no_surat">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Permohonan</th>
                                    <td width="60%" id="tgl">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Berkas Masuk</th>
                                    <td width="60%" id="berkas_masuk">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">No. SP. Kantor</th>
                                    <td width="60%" id="no_sp_kantor">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tgl. SP. Kantor</th>
                                    <td width="60%" id="tgl_sp_kantor">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">No. SP. Lap.</th>
                                    <td width="60%" id="no_sp_lap">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tgl. SP. Lap.</th>
                                    <td width="60%" id="tgl_sp_lap">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">No. LHP.</th>
                                    <td width="60%" id="no_lhp">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tgl. LHP.</th>
                                    <td width="60%" id="tgl_lhp">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">No. SK.</th>
                                    <td width="60%" id="no_sk">-</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tgl. SK.</th>
                                    <td width="60%" id="tgl_sk">-</td>
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
    function clearTable() {
        $('#nama').text('-');
        $('#alamat').text('-');
        $('#alamat_obj').text('-');
        $('#kel').text('-');
        $('#kec').text('-');
        $('#keperluan').text('-');
        $('#kategori').text('-');

        $('#no_surat').text('-');
        $('#tgl').text('-');
        $('#berkas_masuk').text('-');
        $('#no_sp_kantor').text('-');
        $('#tgl_sp_kantor').text('-');
        $('#no_sp_lap').text('-');
        $('#tgl_sp_lap').text('-');
        $('#no_lhp').text('-');
        $('#tgl_lhp').text('-');
        $('#no_sk').text('-');
        $('#tgl_sk').text('-');
    }

    function loadData(evt) {
        var tahun = evt.target.elements.tahun.value;
        var bendel = evt.target.elements.bendel.value;
        var urut = evt.target.elements.urut.value;

        evt.preventDefault();
        $('#loader').fadeIn();

        clearTable();
        $.ajax({
            url: "dummy/pelayanan-pbb-p2/status-d1.php",
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                var pemohon = Object.keys(res.pemohon);
                for (let i = 0; i < pemohon.length; i++) {
                    const el = pemohon[i];
                    if (el && res.pemohon[pemohon[i]]) {
                        $('#' + el).text(res.pemohon[pemohon[i]])
                    }
                }

                var pelayanan = Object.keys(res.pelayanan);
                for (let i = 0; i < pelayanan.length; i++) {
                    const el = pelayanan[i];
                    if (el && res.pelayanan[pelayanan[i]]) {
                        $('#' + el).text(res.pelayanan[pelayanan[i]])
                    }
                }
            }
        });
        $('#loader').fadeOut();
    }
</script>