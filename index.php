<?php
  require_once('header.php');
  require_once('koneksi.php');

  $query = "SELECT * FROM mahasiswa";

?>

<div class="row">
	<div class="col-lg-12">
		<a href="create.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="success">
				<th width="50px">No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Program Studi</th>
				<th>Tahun Masuk</th>
				<th style="text-align: center;">Actions</th>
			</tr>
			<?php
        if ($data = mysqli_query($koneksi, $query)) {
          $a=1;
          while($obj = mysqli_fetch_object($data)){
            ?>
            <tr>
              <td><?= $a ?></td>
              <td><?= $obj->nim ?></td>
              <td><?= $obj->nama ?></td>
              <td><?= $obj->prodi ?></td>
              <td><?= $obj->tahun_masuk ?></td>
              <td style="text-align: center;">
              <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="<?= 'hapus.php?nim='.$obj->nim ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
              <a href="<?= 'edit.php?nim='.$obj->nim ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
              </td>
            </tr>
            <?php
					$a++;
				}
				mysqli_free_result($data);
			}
			?>
		</table>
	</div>
</div>
<?php
mysqli_close($koneksi);
   require_once('footer.php');
?>
