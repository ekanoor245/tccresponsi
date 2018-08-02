<?php
	$nama_barang="";
	if(isset($_POST["nama_barang"]))
	$nama_barang = $_POST["nama_barang"];

	include "koneksi.php";
	$sql= "select * from barang where nama like '%".$nama_barang."%'
			order by idbarang desc";
	$hasil=mysqli_query($kon, $sql);
	if (!$hasil)
		die ("Gagal query..".mysqli_error($kon));
?>
<h1>data barang</h1>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>Foto</th>
		<th>Nama Barang</th>
		<th>Harga jual</th>
		<th>Stok</th>
		<th>Operasi</th>
	</tr>
<?php
	$no=0;
	while($row=mysqli_fetch_assoc($hasil)){
		echo "<tr>";
		echo "<td> <a href='pict/{$row['foto']}'/>
				<img src='thumb/t_{$row['foto']}'width='100'/>
				</a></td>";
		echo "<td>".$row['nama']."</td>";
		echo "<td>".$row['harga']."</td>";
		echo "<td>".$row['stok']."</td>";
		echo "<td>";
		echo "<a href='barang_edit.php?idbarang=".$row['idbarang']."'>EDIT</a>";
		echo "&nbsp;&nbsp;&nbsp;";
		echo "<a href='barang_hapus.php?idbarang=".$row['idbarang']."'>HAPUS</a>";
		echo "</td>";
		echo " </tr>";
	}
?>
</table>