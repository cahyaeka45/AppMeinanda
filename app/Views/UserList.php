<?= $this->extend('layouts/admin')?>
<?= $this->section('content')?>
<?php
    if (session()->getFlashdata('success')){
?>
<div class="alert alert-success alert-dimissible fade show" role="alert">
    <?=session()->getFlashdata('success')?>
    <button type="button" class="close" data-dismiss="alert"aria-label="close">Close</button>
</div>
<?php
    }
?>
<div class="container">
    <h3>Data User</h3>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addUser">Tambah Data </button>

    <table class="table table-striped">
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
                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#editUser-<?=$row['id']?>">Edit</a>
                <a href="<?=base_url('UserController/delete/'.$row['id'])?>" onclick= "return confirm ('Yakin Akan Dihapus?')" class="btn btn-danger btn-sm btn-hapus">Hapus</a></td>
            </tr>
            <form action="<?=base_url('user/edit/'.$row['id'])?>" method="post">
            <div class="modal fade" id="editUser-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <from action="<?=base_url('users')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" value="<?=$row['nama']?>"name="nama">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="<?=$row['username']?>" name="username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" value="<?=$row['password']?>" name="password">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" value="manager" <?=$row['role']=="manager"? "checked":""?> id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1"> 
                        Manager
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="role" value="kasir" <?=$row['role']=="kasir"? "checked":""?> id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                        Kasir
                        </label>
                    </div>
                    <div class="form-group">
                        <input class="form-check-input" type="radio" name="role" value="admin" <?=$row['role']=="admin"? "checked":""?> id="flexRadioDefault3">
                        <label clas="form-check-label" for="flexRadioDefault3">
                        Admin
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Save</button>
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
<!-- Modal Add Product -->
<form action="UserController/simpan" method="post">
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-label ledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <from action="<?=base_url('users')?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" class="form-control" name="nama" placeholder="mama user">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="password">
                    </div>

                    <div class="form-group">
                        <label>Role</label>
                        <input type="text" class="form-control" name="role" placeholder="role">
                    </div>
                    <div class="form-check">
                         <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" value="manager">
                         <label class="form-check-label" for="flexRadioDefault1"> 
                        Manager
                         </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value="kasir">
                        <label class="form-check-label" for="flexRadioDefault2"> 
                        Kasir
                        </label>   
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3" value="admin">
                        <label clas="form-check-label" for="flexRadioDefault3">
                        Admin
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </form>
 <!-- End Modal Add Product -->

<?=$this->endSection()?>