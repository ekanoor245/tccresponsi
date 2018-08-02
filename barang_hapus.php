<?php
	$idbarang = $_GET['idbarang'];
	include "koneksi.php";
	$sql = "select * from barang where idbarang = '$idbarang'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die ('gagal query...');

	$data	= mysqli_fetch_array($hasil);
	$nama	=$data['nama'];
	$harga	=$data['harga'];
	$stok	=$data['stok'];
	$foto	=$data['foto'];

echo "<h2>Konfirmasi Hapus</h2>";
echo "Nama Barang	:&nbsp;&nbsp;&nbsp;&nbsp;".$nama."<br/>";
echo "Harga Barang	:&nbsp;&nbsp;&nbsp;&nbsp;".$harga."<br/>";
echo "Stok	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;".$stok."<br/>";
echo "Foto	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp; <img src='thumb/t_".$foto."'/><br/><br/>";
echo "<b>APAKAH DATA INI AKAN DIHAPUS?</b><br/><br/>";
echo "<a href='barang_hapus.php?idbarang=$idbarang&hapus=1'>YA</a>&nbsp;&nbsp;&nbsp;<a href='barang_tampil.php'>TIDAK</a>";

if (isset ($_GET['hapus'])) {
	$sql = "delete from barang where idbarang ='$idbarang'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) {
	echo "gagal hapus barang :$nama..<br/>";
	echo "<a href='barang_tampil.php'>Kembali ke Daftar Barang</a>";
		}else {
	$gbr = "pict/foto";
	if (file_exists($gbr)) unlink ($gbr);
	$gbr = "thumb/t_$foto";
	if (file_exists($gbr)) unlink ($gbr);
	header ('location:barang_tampil.php');
		}
	}
	?>