<?php
require_once('header.php');
require_once('koneksi.php');

if($_POST){
	try {
		$sql = "INSERT INTO mahasiswa (nim, nama, prodi, tahun_masuk) VALUES ('".$_POST['nim']."','".$_POST['nama']."','".$_POST['prodi']."','".$_POST['tahun_masuk']."')";
		if(!$koneksi->query($sql)){
			echo $koneksi->error;
			die();
		}

	} catch (Exception $e) {
		echo $e;
		die();
	}
	  echo "<script>
	alert('Data berhasil di simpan');
	window.location.href='index.php';
	</script>";
}
?>
<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<div class="form-group">
				<label>NIM</label>
				<input type="number" value="" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Program Studi</label>
				<input type="text" value="" class="form-control" name="prodi">
			</div>
			<div class="form-group">
				<label>Tahun Masuk</label>
				<input type="text" value="" class="form-control" name="tahun_masuk">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="create" value="Tambah">
		</form>
	</div>
</div>

<?php
require_once('footer.php')
?>