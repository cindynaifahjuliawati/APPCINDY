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
    <h3><b>Data User</b></h3>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#addUser">Tambah Data</button>

    <table class="table table-bordered">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Option</th>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach($data as $row):
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['username']?></td>
                <td><?=$row['role']?></td>
                <td><a href="#" class="btn btn-primary btn-sm btn-edit" data-toggle="modal" data-target="#editUser-<?=$row['id']?>">Edit</a>
                <a href="<?= base_url('UserController/delete/'.$row['id'])?>" onclick="return confirm('Yakin Akan dihapus')" class="btn btn-danger btn-sm btn-delete">Hapus</a></td>
            </tr>

            <form action="<?= base_url('user/edit/'.$row['id'])?>" method="post">
    <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('user')?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama User" value="<?=$row['nama']?>">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?=$row['username']?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir" <?=$row['role']=="kasir"?"checked":""?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Kasir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager" <?=$row['role']=="manager"?"checked":""?>>
                            <label class="form-check-label" for="flexRadioDeafult2">
                                Manager
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin" <?=$row['role']=="admin"?"checked":""?>>
                            <label class="form-check-label" for="flexRadioDefault3">
                                Admin
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
</form>
            <?php
            $no++;
            endforeach?>
        </tbody>
</table>
</div>
<form action="/UserController/simpan" method="post">
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('users')?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama User">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="kasir">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Kasir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="manager">
                            <label class="form-check-label" for="flexRadioDeafult2">
                                Manager
                            </label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Admin
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Save</button>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
</form>
<?= $this->endSection()?>