<?php
require 'functions.php';
$id_user = $_GET["id"];
if( hapus($id_user) > 0 ) {
	echo "<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data-dokter.php';
		</script>";
} else {
	echo "<script>
			alert('data gagal dihapus!');
			document.location.href = 'data-dokter.php';
		</script>";
}
?>