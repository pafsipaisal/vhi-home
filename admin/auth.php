<?php
include "config/koneksi.php";

$modul = $_GET['modul'];
$act = $_GET['act'];

if($modul == "auth" && $act == "cek_auth"){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	#cek username 
	$sql_uname = "SELECT * FROM users WHERE username = '$username'";
	$query_uname = mysqli_query($konek,$sql_uname);
	if(mysqli_num_rows($query_uname)>0){
		#cek password
		$sql_password = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query_password = mysqli_query($konek,$sql_password);
		if(mysqli_num_rows($query_password)>0){
			session_start();
			$r=mysqli_fetch_assoc($query_password);
			$_SESSION['id_user'] = $r['id_user'];
			$_SESSION['username'] = $r['username'];
			$_SESSION['password']  = $r['password'];
			$_SESSION['nama']  = $r['nama'];
			$_SESSION['level_user'] = $r['level_user'];
			$_SESSION['gambar'] = $r['gambar'];

			echo "<meta http-equiv='refresh' content='0; url=media.php?modul=home'>";
		}else{
			echo "<script>alert('Password salah. Gagal Login')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}
	}else{
		echo "<script>alert('Username Tidak Terdaftar. Gagal Login')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
}

else if($modul == "auth" && $act == "logout"){
	session_start();
	session_destroy();
	echo "<script>alert('Logout Berhasil')</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

else if($modul == "auth" && $act == "forgot"){
	$username = $_POST['username'];

	#cek username 
	$sql_uname = "SELECT * FROM users WHERE username = '$username'";
	$query_uname = mysqli_query($konek,$sql_uname);
	if(mysqli_num_rows($query_uname)>0){
		// #cek password
		// $sql_password = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		// $query_password = mysqli_query($konek,$sql_password);
		// if(mysqli_num_rows($query_password)>0){
			$passwordbaru=md5($_POST['passwordbaru']);
			$sql = "UPDATE users SET
				password = '$passwordbaru'
				WHERE username = '$username'";
			$query = mysqli_query($konek,$sql);
			if($query){
			echo "<script>alert('Password Baru Berhasil di Update')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		//}
		}else{
			echo "<script>alert('Update Password Gagal')</script>";
			echo "<meta http-equiv='refresh' content='0; url=password_lupa.php'>";
		}
	}else{
		echo "<script>alert('Username Tidak Terdaftar. Gagal Update')</script>";
		echo "<meta http-equiv='refresh' content='0; url=password_lupa.php'>";
	}

}
else if($modul == "auth" && $act == "register"){
	$upload='assets/dist/img/'.$_FILES['gambar']['name'];
	$gambar= $_FILES['gambar']['name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$level_user = 'petugas';
	$status_user = 'NA';

	$sql = "INSERT INTO users 
			(username,password,nama,jk,agama,alamat,level_user,status_user,gambar) 
			VALUES ('$username','$password','$nama','$jk','$agama','$alamat','$level_user','$status_user','$gambar')";
	$query = mysqli_query($konek,$sql);
	if($query){
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$upload)) {
			echo "<script>alert('Tambah Data Berhasil')</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php'>";
		}else{
			#jika berhasil kembali ke halaman tambah user
			echo "<script>alert('Upload Gagal. Tambah Data Gagal')</script>";
			echo "<meta http-equiv='refresh' content='0; url=register.php'>";
		}		
	}else{
		#jika berhasil kembali ke halaman tambah user
		echo "<script>alert('Tambah Data Gagal')</script>";
		echo "<meta http-equiv='refresh' content='0; url=register.php>";
	}
}
else{
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}


