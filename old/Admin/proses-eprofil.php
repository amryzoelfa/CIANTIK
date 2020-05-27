<?php
// Load file koneksi.php
include "../koneksi.php";
//include "../session.php";

// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
  $id_user = $_POST['id'];
// Ambil Data yang Dikirim dari Form
  $no_identitas = $_POST['no_identitas'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jk'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
  // Ambil data foto yang dipilih dari form
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  
  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  
  // Set path folder tempat menyimpan fotonya
  $path = "../img/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
    // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
    $query = "SELECT * FROM tb_user WHERE id_user='$id_user'";
    $result = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $data = mysqli_fetch_array($result); // Ambil data dari hasil eksekusi $sql
    // Cek apakah file foto sebelumnya ada di folder images
    if(is_file("../img/".$data['foto'])) // Jika foto ada
      unlink("../img/".$data['foto']); // Hapus file foto sebelumnya yang ada di folder images
    
    // Proses ubah data ke Database
      
    $query = "UPDATE tb_user SET no_identitas='$no_identitas', nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_hp='$no_hp', foto='$fotobaru' WHERE id_user='$id_user'";
    $result = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($result){ // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: profil-admin.php"); // Redirect ke halaman index.php
    }else{
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      //echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
    }
  }else{
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    //echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
  // Proses ubah data ke Database
   $query = "UPDATE tb_user SET no_identitas='$no_identitas', nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_hp='$no_hp' WHERE id_user='$id_user'";
  $result = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
  if($result){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: profil-admin.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    //echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
  }
}
?>