<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Detail Pegawai'; 
    //variabel yang berfungsi mengatifkan sidebar
    $pegawai = 'pegawai';

    // menghubungkan file header dengan file detail Pegawai
    require_once "_template/_header.php";

    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $nip = $_GET['id'];

    // lakukan filter data berdasarkan nip yang telah ditangkap divariabel nip dan jalankan function query
    // simpan hasil query kedalam variabel data_detail
    $data_detail = query("SELECT * FROM pegawai WHERE nip='$nip'");
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Pegawai</li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4 border-left-primary">
            <div class="card-body">
                <div class="text-center">
                    <img src="<?= asset('_assets/img/').$data_detail[0]['foto_pegawai']; ?>" class="img-fluid shadow" alt="Foto Pegawai">
                    <h2 class="mt-3"><?= ucwords($data_detail[0]['nama_pegawai']) ?></h2>
                    <span class="text-muted"><?= $data_detail[0]['nip'] ?></span>
                </div>
                <hr>
                <span class="text-info"><i class="fas fa-phone"></i></span>
                <span class="text-info float-right"><?= $data_detail[0]['nip'] ?></span>
                <hr>
                <span class="text-info"><i class="fas fa-envelope"></i></span>
                <span class="text-info float-right"><?= $data_detail[0]['email'] ?></span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4 border-bottom-primary">
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link stat-profil" id="profil" onClick="link_profil('<?= $data_detail[0]['nip'] ?>')" href="javascript:void(0)">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link stat-keluarga" id="keluarga" onclick="link_keluarga()" href="javascript:void()">Keluarga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link stat" id="pendidikan" href="#">Pendidikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link stat" id="jabatan" href="#">Jabatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link stat" id="pangkat" href="#">Pangkat</a>
                    </li>
                </ul>
            </div>
            <div class="card-body mt-n4" id="dataLink"></div>
        </div>
    </div>
</div>
<?php

    // menambahkan script khusus untuk halaman ini saja
    $addscript = "
        <script>
            function link_profil(nip){
                $.get('detail_pegawai/profil.php',{nip:nip}, function(data){
                    $('#dataLink').html(data);
                })
            }
            function link_keluarga(){
                $.get('detail_pegawai/keluarga.php', function(data){
                    $('#dataLink').html(data);
                })
            }
        </script>
    ";

    // menghubungkan file footer dengan file detail pegawai
    require_once "_template/_footer.php";
?>