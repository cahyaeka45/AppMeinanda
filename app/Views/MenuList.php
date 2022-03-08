<?=$this->extend('layouts/admin')?>
<?=$this->section('content')?>
<?php
    if(session()->getFlashdata('success')){
?>
<div class="alert-success alert-dismissible fade-show" role="alert">
    <?=session()->getFlashdata('success')?>
    <button type="button" class="close" data-dismiss="alert" aria-label="close"></button>
</div>
<?php   
    }
?>
<div class="container">
    <h3>Data Menu</h3>
    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#addMenu">Tambah Data</button>
    <table class="table table-striped">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Stok</th>
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
                <td><?=$row['harga']?></td>
                <td><?=$row['jenis']?></td>
                <td><?=$row['stok']?></td>
                <td><a href="#" class="btn btn-primary" data-toggle="modal"
                        data-target="#editMenu-<?=$row['id']?>">Edit</a>
                    <a href="<?=base_url('MenuController/delete/'.$row['id'])?>"
                        onclick="return confirm ('Yakin Akan Dihapus?')"
                        class="btn btn-danger btn-sm btn-hapus">Hapus</a></td>
            </tr>
            <form action="<?=base_url('menu/edit/'.$row['id'])?>" method="post">
                <div class="modal fade" id="editMenu-<?=$row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Menu</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="<?=$row['nama']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" id="harga" class="form-control"
                                            value="<?=$row['harga']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <input type="text" name="jenis" id="jenis" class="form-control"
                                            value="<?=$row['jenis']?>" required>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1"
                                            value="makanan">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Makanan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2"
                                            value="minuman">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Minuman
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3"
                                            value="camilan">
                                        <label clas="form-check-label" for="flexRadioDefault3">
                                            Camilan
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="text" name="stok" id="stok" class="form-control"
                                            value="<?=$row['stok']?>" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-secondary">Save</button>
                                    </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                $no++;
                endforeach
                ?>
        </tbody>
    </table>
</div>
<form action="MenuController/simpan" method="post">
    <div class="modal fade" id="addMenu" tabindex="-1" aria-labelledby="exampleModalLabel" ari-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?=base_url('menus')?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Menu</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="nama menu"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control" placeholder="harga"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Jenis</label>
                            <input type="text" name="jenis" id="jenis" class="form-control" placeholder="jenis"
                                required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1"
                                value="makanan">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Makanan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault2"
                                value="minuman">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Minuman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault3"
                                value="camilan">
                            <label clas="form-check-label" for="flexRadioDefault3">
                                Camilan
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" name="stok" id="stok" class="form-control" placeholder="stok" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</form>
<?=$this->endSection()?>