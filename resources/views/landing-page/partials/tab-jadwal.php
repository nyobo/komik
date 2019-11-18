<?php
use App\Jadwal;
use App\Komik;

$jadwals = Jadwal::getDataHari();
?>
<style>
    .card-judul{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .card-text-judul{
        margin-bottom:0;
        padding-left:5px;
    }
</style>
<div class="container">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <?php $noJadwal1 = 0; ?>
            <?php foreach ($jadwals as $jadwal) {?>
                <?php $active = $noJadwal1==0 ? 'active' : ''; ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo($active)?>" id="pills-<?php echo($jadwal['name'])?>-tab" data-toggle="pill" href="#pills-<?php echo($jadwal['name'])?>" role="tab" aria-controls="pills-<?php echo($jadwal['name'])?>" aria-selected="true"><?php echo($jadwal['name'])?></a>
                </li>
            <?php $noJadwal1 = $noJadwal1+1; } ?>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <?php $noJadwal2 = 0 ;?>
        <?php foreach ($jadwals as $jadwal) {?>
            <?php $active = $noJadwal2==0 ? 'show active' : ''; ?>
            <div class="tab-pane fade <?php echo($active)?>" id="pills-<?php echo($jadwal['name'])?>" role="tabpanel" aria-labelledby="pills-<?php echo($jadwal['name'])?>-tab"><?php echo($jadwal['name'])?>
                <?php $komiks = new Komik();
                    $komik = $komiks->getKomikByIdJadwal($jadwal['id']);
                if ($komik!=null) { ?>
                    <div class="row">

                        <?php foreach ($komik as $kom) { ?>
                            <div class="col col-2 coba">
                                <div class="card bg-drak text-white">
                                    <img class="card-img" src="http://127.0.0.1:8000/images/komik/<?php echo($kom['image_profile'])?>"></img>
                                    <div class="card-judul">
                                        <p class="card-text-judul" style="background-color: #1b1e2173;"><?php echo($kom['judul'])?>   <a class="fa fa-heart"></a></p>
                                    </div>
                                </div>
                            </div> 
                        
                        <?php } ?>
                        <?php if (sizeof($komik) > 5) { ?>
                            <div class="col col-2  coba">
                                <div class="card bg-dark text-white">
                                    <div class="bg-dark" style="height:200px">
                                        <a href="#" class="m-2 text-white">Lihat Semua > </a>
                                    </div> 
                                </div>
                            </div>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        <?php $noJadwal2= $noJadwal2+1;} ?>
    
    </div>
</div>

