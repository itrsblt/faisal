<div class="page-wrapper">
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Sidia</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item">Penerimaan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="<?= base_url('adminpanel') ?>/penerimaan/tambah" method="post">
                                    <input type="text" class="form-control form-control-sm mt-2" name="no_bukti" value="020/SBBM/<?= date('Ymd'); ?>0000" autocomplete="off" placeholder="No Bukti" required>
                                    <input type="text" class="form-control form-control-sm mt-2 mb-2" name="no_dokumen" value="<?php echo set_value('no_dokumen'); ?>" autocomplete="off" placeholder="No Dokumen" required>
                                    <input type="text" class="form-control form-control-sm mt-2 mb-2" name="no_pesanan" autocomplete="off" value="<?php echo set_value('no_pesanan'); ?>" placeholder="No Pesanan" required>
                                    <input type="text" class="form-control form-control-sm mt-2 mb-2" name="no_faktur" value="<?php echo set_value('no_faktur'); ?>" autocomplete="off" placeholder="No Faktur" required>
                                    <div class="mb-2">
                                        <input type="text" class="form-control form-control-sm  mb-2" required name="no_berita" value="<?php echo set_value('no_berita'); ?>" autocomplete="off" placeholder="No BAP">
                                    </div>
                                    <div class="mb-2">
                                        <select name="rekeningasal" class="js-example-placeholder-singlee js-states form-control form-control-sm mt-2" required>
                                            <option></option>
                                            <?php foreach ($rekening as $rk) : ?>
                                                <option value="<?php echo $rk['nama']; ?>">
                                                    <?php echo $rk['kode']; ?> <?php echo $rk['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="mb-2">
                                        <select name="perolehan" class="js-example-placeholder-singleep js-states form-control form-control-sm mt-2" required>
                                            <option></option>
                                            <?php foreach ($dataperolehan as $pr) : ?>
                                                <option value="<?php echo $pr['nama']; ?>">
                                                    <?php echo $pr['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <select name="gudang" class="js-example-placeholder-singleepg js-states form-control form-control-sm mt-2" required>
                                            <option></option>
                                            <?php foreach ($datagudang as $dgd) : ?>
                                                <option value="<?php echo $dgd['nama']; ?>">
                                                    <?php echo $dgd['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <select name="supplier" class="js-example-placeholder-singleesp js-states form-control form-control-sm mt-2" required>
                                            <option></option>
                                            <?php foreach ($datasupplier as $dsp) : ?>
                                                <option value="<?php echo $dsp['nama']; ?>">
                                                    <?php echo $dsp['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="barang">
                                        <div id="mydiv">
                                            <div class="mb-2">
                                                <select name="barang[]" id="barang" class="js-example-placeholder-singleekd js-states form-control form-control-sm mt-2">
                                                    <option></option>
                                                    <?php foreach ($barang as $dj) : ?>
                                                        <option value="<?php echo $dj['kode']; ?>" data-stok="<?php echo $dj['stok'];  ?>" data-harga="<?php echo $dj['harga'];  ?>" data-satuan="<?php echo $dj['satuan'];  ?>" data-nabar="<?php echo $dj['nama'];  ?>">
                                                            <?php echo $dj['kode']; ?> <?php echo $dj['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <input type="hidden" id="nama_barang" class="form-control form-control-sm mt-2" name="nama_barang[]" autocomplete="off" value="" placeholder="Nama Barang">
                                            <div class="mb-2">
                                                <select name="permendagri[]" id="permendagri" class="js-example-placeholder-singleekg js-states form-control form-control-sm mt-4">
                                                    <option></option>
                                                    <?php foreach ($datapermendagri as $dpm) : ?>
                                                        <option value="<?php echo $dpm['uraian']; ?>">
                                                            <?php echo $dpm['kode']; ?> <?php echo $dpm['uraian']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <input type="date" id="expired" class="form-control form-control-sm mt-2 " name="expired[]" value="" placeholder="Expired">

                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="number" id="jumlah" class="form-control form-control-sm mt-2 mb-2" name="jumlah[]" value="" autocomplete="off" placeholder="Jumlah">
                                                </div>
                                                <div class="col-6">
                                                    <input type="number" id="harga" class="form-control form-control-sm mt-2 mb-2" name="harga[]" value="" autocomplete="off" placeholder="Harga">
                                                </div>
                                            </div>
                                            <input type="text" id="tkdn" class="form-control form-control-sm mt-2 mb-2" name="tkdn[]" autocomplete="off" value="" placeholder="Persentase TKDN/P3DL">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm mt-2 mb-2" name="keterangan" value="<?php echo set_value('keterangan'); ?>" autocomplete="off" placeholder="Keterangan">
                                <input type="date" class="form-control form-control-sm mt-2 mb-2" name="tanggal_ba" value="<?php echo set_value('tanggal_ba'); ?>" placeholder="Tanggal BA" required>
                                <input type="date" class="form-control form-control-sm mt-2 mb-2" name="tanggal_pesanan" value="<?php echo set_value('tanggal_pesanan'); ?>" placeholder="Tanggal Pesanan" required>
                                <input type="date" class="form-control form-control-sm mt-2 mb-2" name="tanggal_faktur" value="<?php echo set_value('tanggal_faktur'); ?>" placeholder="Tanggal Faktur" required>
                                <input type="date" class="form-control form-control-sm mt-2 mb-2" name="tanggal_bap" value="<?php echo set_value('tanggal_bap'); ?>" placeholder="Tanggal BAP" required>

                                <div class="mb-2">
                                    <select name="rekeningpencatatan" class="js-example-placeholder-singlepc js-states form-control form-control-sm mt-2" required>
                                        <option></option>
                                        <?php foreach ($rekening as $rk) : ?>
                                            <option value="<?php echo $rk['nama']; ?>">
                                                <?php echo $rk['kode']; ?> <?php echo $rk['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <select name="sumberdana" class="js-example-placeholder-singleeps js-states form-control form-control-sm mt-4" required>
                                        <option></option>
                                        <?php foreach ($datasumber as $sb) : ?>
                                            <option value="<?php echo $sb['nama']; ?>">
                                                <?php echo $sb['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <select name="kegiatan" class="js-example-placeholder-singleepk js-states form-control form-control-sm mt-4">
                                        <option></option>
                                        <?php foreach ($datakegiatan as $dkg) : ?>
                                            <option value="<?php echo $dkg['nama']; ?>">
                                                <?php echo $dkg['kode']; ?> <?php echo $dkg['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <select name="jenis_pengadaan" class="js-example-placeholder-singleejp js-states form-control form-control-sm mt-4">
                                        <option></option>
                                        <?php foreach ($datapengadaan as $dpgd) : ?>
                                            <option value="<?php echo $dpgd['nama']; ?>">
                                                <?php echo $dpgd['nama']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="row ">
                                    <div class="col-8">
                                        <select name="einventaris[]" id="einventory" class="js-example-placeholder-singleeivt js-states form-control form-control-sm mt-2 ">
                                            <option></option>
                                            <?php foreach ($dataeinventory as $dtiv) : ?>
                                                <option value="<?php echo $dtiv['kode']; ?>" data-satuaneiv="<?php echo $dtiv['satuan'];  ?>" data-namaeiv="<?php echo $dtiv['nama'];  ?>">
                                                    <?php echo $dtiv['kode']; ?> - <?php echo $dtiv['nama']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <input type="hidden" class="form-control" id="namaeiv" value="" name="namaeiv[]">
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm" id="satuaneiv" name="satuan_einventory[]" value="" autocomplete="off" placeholder="Satuan Einventory">
                                    </div>

                                </div>
                                <div class="barang">

                                    <input type="text" class="form-control form-control-sm mt-2 mb-2" id="satuan" name="satuan[]" value="" placeholder="Satuan">


                                    <input type="text" class="form-control form-control-sm mt-2" id="batch" name="batch[]" value="" autocomplete="off" placeholder="Batch">

                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" id="total" class="form-control form-control-sm mt-2 mb-2" name="total[]" value="" autocomplete="off" placeholder="Total">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control form-control-sm mt-2 mb-2" id="stok" name="stok[]" value="" autocomplete="off" placeholder="Stok">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary" id="custom-submit-input" onclick="tampilkanBarang()">Tambah Barang</button>
                            <!-- <a href="<?= base_url(); ?>adminpanel/barang" class="btn btn-warning mt-2" style="margin-left:10px">Kembali</a> -->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="example3" class="display nowrap " style="width:100%;font-size:12px;">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Satuan</th>
                                            <th>Permendagri</th>
                                            <th>Expired</th>
                                            <th>Batch</th>
                                            <th>Tkdn</th>
                                            <th>Kode Einventory</th>
                                            <th>Nama Einventory</th>
                                            <th>Satuan Einventory</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody_barang">

                                    </tbody>
                                </table>


                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Simpan</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
