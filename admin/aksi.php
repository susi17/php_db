<?php
include "../include/koneksi.php";
$module=$_GET[module];
$act=$_GET[act];

	//delete data dalam database
if ($module=='user' AND $act=='hapus') {
	mysqli_query($koneksi,"delete from admin where id_user='$_GET[id]'");
	header('location:server.php?module=user');
}
	//bagian user
	//input user
elseif ($module=='user' AND $act=='input'){
	$id_login=$_POST['id_user'];
	$id=mysqli_query($koneksi, "select * from admin where id_user='$id_login'
		");
	$r=mysqli_fetch_array($id);
	$cek=$r[id_user];
	if($id_login = $cek) {
		print "<script>alert(\"user dengan nama $id_login sudah
		terdaftar, Silahkan Cek Kembali!!!\");
		location.href = \"server.php?module=user&act=tambahuser\";
	</script>";
}
elseif(empty($_POST['id_user'])){
	print "<script>alert(\"username tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
elseif(empty($_POST['password'])){
	print "<script>alert(\"password tidak boleh kosong!!!\");
	location.href = \"javascript:history.go(-1)\";</script>";
}
else{
	$pass=$_POST['password'];
	mysqli_query($koneksi, "insert into
		admin(id_user,password)values('$_POST[id_user]','$pass')");
	header('location:server.php?module='.$module);
}
}
	//update user
elseif ($module=='user' and $act=='update') {
	if(empty($_POST['id_user'])){
		print "<script>alert(\"username tidak boleh kosong!!!\");
		location.href = \"javascript:history.go(-1)\";</script>";
	}
	else{
	//apabila password tidak dirubah
		if (empty($_POST[password])) {
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]'
				where id_user='$_POST[id]'");
		}
	//apabila password dirubah
		else{
			$pass=$_POST[password];
			mysqli_query($koneksi, "update admin set id_user='$_POST[id_user]',
				password='$pass' where id_user='$_POST[id]'");
		}
		header('location:server.php?module=user');
	}
}
?>