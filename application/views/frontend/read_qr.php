<?php //wfDebug($kunker);?>
<div class="container">
<div class="col-lg-12">
    <h1><img alt="image" src="<?= base_url() ?>assets/img/dpr.png" style="width: 40px;" /> SIMONIZ</h1>
</div>
   
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">Anggota:
                        <?= $kunker->anggota ?>
                    </li>
                    <li class="list-group-item">Waktu:
                        <?= $kunker->tanggal_surat ?>
                    </li>
                    <li
                     class="list-group-item">Kunjungan ke:
                        <?= $kunker->kunjungan_ke ?>
                    </li>
                    <li class="list-group-item">Jumlah Hari:
                        <?= $kunker->jumlah_hari ?>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="embed-responsive embed-responsive-21by9">
                    <iframe class="embed-responsive-item" width="560" height="515"
                        src="<?= base_url() ?>assets/dok_permohonan/dok_permohonan_1686997000.pdf"
                        frameborder="0"></iframe>
                </div>
            </div>
        </div>
</div>