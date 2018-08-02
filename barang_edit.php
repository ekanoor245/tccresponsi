<?php
	$idbarang=$_GET["idbarang"];
	include "koneksi.php";
	$sql = "select * from barang where idbarang='$idbarang'";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil) die ("gagal query..");

	$data = mysqli_fetch_array($hasil);
	$nama	=$data["nama"];
	$harga	=$data["harga"];
	$stok	=$data["stok"];
	$foto	=$data["foto"];
?>
<h2>.::EDIT BARANG::.</h2>
<form action="barang_simpan.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="idbarang" value="<?php echo $idbarang;?>"/>
<table border="1" cellspacing="0" cellpadding="5">
<tr>
	<td>Nama Barang</td>
	<td><input type="text" name="nama"	value="<?php echo $nama;?>"		/></td>
</tr>
<tr>
	<td>Harga Jual</td>
	<td><input type="text" name="harga"	value="<?php echo $harga;?>"	/></td>
</tr>
<tr>
	<td>Stok</td>
	<td><input type="text" name="stok"	value="<?php echo $stok;?>"		/></td>
</tr>
<tr>
	<td>Gambar [max=1.5MB]</td>
	<td>
	<input type="file" name="foto">
	<input type="hidden" name="foto_lama" value="<?php echo $foto;?>"/><br/>
	<img src="<?php echo "thumb/t_" .$foto;?>" width="100px"/>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="SIMPAN" name="proses"/>
	<input type="reset" value="RESET" name="reset"/>
	</td>
</tr>
</table>
</form>