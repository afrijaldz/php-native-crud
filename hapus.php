<?php
require_once('koneksi.php');
try {
	$sql = "DELETE FROM mahasiswa WHERE nim=".$_GET['nim'];
	$koneksi->query($sql);
} catch (Exception $e) {
	echo $e;
	die();
}
  echo "<script>
	alert('Data berhasil di hapus');
	window.location.href='index.php';
	</script>";
?>