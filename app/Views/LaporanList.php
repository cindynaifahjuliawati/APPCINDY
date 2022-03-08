<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
    <?php
        if(session()->getFlashdata('success')){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success')?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">Succes</button>
    </div>
    <?php
        }
    ?>
<div class="container">
    <h3><b>Laporan</b></h3>
    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>User Id</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>No Meja</th>
            <th>Nama Pemesan</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['user_id']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['total_harga']?></td>
                <td><?=$row['no_meja']?></td>
                <td><?=$row['nama_pemesan']?></td>
                <td><a href="<?=base_url('/LaporanController/delete/'.$row['id'])?>" onclick="return confirm('Yakin mau dihapus')" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>
            <?php
            $no++;
            endforeach?>
        </tbody>
    </table>
</div>
<?= $this->endSection()?>