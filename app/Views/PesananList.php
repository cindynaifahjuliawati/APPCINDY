<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
    <?php
        if(session()->getFlashdata('success')){
    ?>
    <div class= "alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">Success</button>
    </div>
    <?php
        }
    ?>
<div class="row">
    <div class="col-md-6">
        <form action="<?=base_url('pesanan')?>" method="post">
        <div class="card shadow mb-3 border-left-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="">Silahkan Pilih Menu</option>
                        <?php
                        foreach ($data as $key=>$row) {
                        ?>
                            <option value="<?=$row['id']?>"><?=$row['nama']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Masukkan Keranjang </button>
                </div>
            </div>
        </div>
    </form>
    </div>
    <div class="col-md-6">
        <form action="<?=base_url('pesanans')?>" method="post">
        <div class="card shadow mb-3 border-left-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pesanan">Nama Pesanan</label>
                    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                </div>
                <div class="form-group">
                    <label for="no_meja">Nomor Meja</label>
                    <input type="number" class="form-control" name="no_meja" id="no_meja">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="card">
        <card class="header">
    <h3 class="card-title"><strong>Data Pesanan</strong></h3>
    </card>
    <div class="table-responsive">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th> 
            <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if($menu !=null){
                $no= 0;
                foreach($menu as $row){
                    $no++
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['harga']?></td>
                <td><?=$row['jumlah']?></td>
                <td><?=$row['jumlah']*$row['harga']?></td>
                <td><a href="<?=base_url('pesanan/delete/'.$row['menu_id'])?>" class="btn btn-danger">Hapus</a></td>
            </tr>
            <?php
                }
            }?>
        </tbody>
    </table>
    </div>
</div>
</div>
<?= $this->endSection()?>