<?php
# Membuat dan Deklarasi Folder dan FIle
# Membaca url (GET url)
# GET modul, GET act

$modul = $_GET['modul'];

switch ($modul) {
	case 'user':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/mod_user/user.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	// case 'menu':
	// if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
	// 	include 'views/modul/mod_perusahaan/berita.php';
	// }else{
	// 	echo "<script>alert('Login Terlebih Dahulu')</script>";
	// 	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	// }

	case 'menu':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/mod_menu/menu.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	case 'perusahaan':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/mod_perusahaan/perusahaan.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	case 'password':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/mod_password/password.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	case 'home':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/home.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	case 'peta':
	if(!empty($_SESSION['username']) AND !empty($_SESSION['password'])){
		include 'views/modul/mod_peta/peta.php';
	}else{
		echo "<script>alert('Login Terlebih Dahulu')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php'>";
	}
	break;

	case 'auth':
	include 'auth.php';
	break;
	
	default:
		# code...
	break;
}