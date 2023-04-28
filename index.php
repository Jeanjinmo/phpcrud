<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<?php
//cari
if(isset($_POST['cari'])) {
	$cari = $_POST['cari'];
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE nama='$cari'");
}else{
	$query = mysqli_query($mysqli, "SELECT * FROM users");
}
?>

<html>

<head>
	<title>Homepage</title>
</head>

<body>
	<h1 style="position: relative; left:150px">Daftar Table Users</h1>
	<a href="add.html" style="position:fixed; right:165px; ">Tambah Data Baru</a><br /><br />
	<form method="GET" action="index.php" style="position: relative; left:150px"">
		<label>Cari User </label>
		<input type="text" name="kata_cari" 
		value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		<button type="submit">Cari</button>
	</form>
	</form>
	<center>
		<table width='80%' border=0>
		
			<tr bgcolor='#CCCCCC'>
				<td>Nama</td>
				<td>Umur</td>
				<td>Email</td>
				<td>Gambar</td>
				<td>Aksi</td>
			</tr>

			<?php

				//jika kita klik cari, maka yang tampil query cari ini
				if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
					$query = "SELECT * FROM users WHERE nama like '%".$kata_cari."%' OR umur like '%".$kata_cari."%' OR email like '%".$kata_cari."%' ORDER BY id ASC";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM users ORDER BY id ASC";
				}
				$result = mysqli_query($mysqli, $query);

			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $res['nama'] . "</td>";
				echo "<td>" . $res['umur'] . "</td>";
				echo "<td>" . $res['email'] . "</td>";
				echo "<td><img width='80' src='image/" . $res['gambar'] . "'</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Kamu yakin untuk delete ini?')\">Delete</a></td>";
			}
			?>
		</table>
	</center>
</body>

</html>
