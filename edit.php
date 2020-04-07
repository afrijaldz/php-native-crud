<?php
require_once('koneksi.php');
require_once('header.php');

if($_POST){

	$sql = "UPDATE mahasiswa SET nama='".$_POST['nama']."', prodi='".$_POST['prodi']."', tahun_masuk='".$_POST['tahun_masuk']."' WHERE nim=".$_POST['nim'];

	if ($koneksi->query($sql) === TRUE) {
	    echo "<script>
	alert('Data berhasil di update');
	window.location.href='index.php';
	</script>";
	} else {
	    echo "Gagal: " . $koneksi->error;
	}

	$koneksi->close();
	
} else {
	$query = $koneksi->query("SELECT * FROM mahasiswa WHERE nim=".$_GET['nim']);

	if($query->num_rows > 0){
		$data = mysqli_fetch_object($query);
	}else{
		echo "data tidak tersedia cok";
		die();
	}
?>

<div class="row">
	<div class="col-lg-6">
		<form action="" method="POST">
			<input type="hidden" name="nim" value="<?= $data->nim ?>">
			<div class="form-group">
				<label>NIM</label>
				<input type="number" disabled value="<?= $data->nim ?>" class="form-control" name="nim">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" value="<?= $data->nama ?>" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label>Program Studi</label>
				<input type="text" value="<?= $data->prodi ?>" class="form-control" name="prodi">
			</div>
			<div class="form-group">
				<label>Tahum Masuk</label>
				<input type="text" value="<?= $data->tahun_masuk ?>" class="form-control" name="tahun_masuk">
			</div>
			<input type="submit" class="btn btn-primary btn-sm" name="Update" value="Update">
		</form>
	</div>
</div>
<?php
}
mysqli_close($koneksi);
require_once('footer.php')
?>