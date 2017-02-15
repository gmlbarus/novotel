<?php
include '../../../login/hub.php';
function upload($idf){
	$nama_file = $_FILES['gambar']['name'];
	$type = $_FILES['gambar']['type'];
	$size = $_FILES['gambar']['size'];
	if(!ereg("image",$type))
		die("	<script language='JavaScript'>alert('File yang Anda unggah bukan gambar! ');
				document.location='../../?page=kamar';</script> 
			");
	if($size > 1000 * 1024)
		die("	<script language='JavaScript'>alert('File yang Anda unggah melebihi batas maksimum ukuran!');
				document.location='../../?page=kamar';</script> 
			");
	    if(!empty($_FILES['gambar']['tmp_name']))
	    {
	        $upload = move_uploaded_file($_FILES['gambar']['tmp_name'], '../../../asset/images/kamar/'.$idf.'.jpg');
	        if($upload)
	        {	
	            echo "<script>alert('Data berhasil ditambahkan!');
						document.location='../../?page=kamar';
						</script>";
	        }
			else{
				echo "<script>alert('Gagal mengunggah file yang Anda pilih!');
						document.location='../../?page=kamar';
						</script>";
			}
	    }
		else{
				echo "<script>alert('Tidak ada file yang Anda pilih!');
						//document.location='../../?page=kamar';
						</script>";
		}
}

$nama = mysql_real_escape_string($_POST['nama']);
$harga = mysql_real_escape_string($_POST['harga']);
$kat = mysql_real_escape_string($_POST['kat']);
$desk = mysql_real_escape_string($_POST['deskripsi']);
$sub= mysql_real_escape_string($_POST['sub']);
	if((empty($nama) or empty($sub)) or (empty($harga) or empty($kat)))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_kamar'
			</script>";
	}
	if(empty($desk))
	{echo "<script>alert('Data tidak lengkap!');
			document.location='../../?page=input_kamar'
			</script>";
	}
	else
	{
		if($sub=='input'){
			$simpan=mysql_query('insert into kamar values("","'.$nama.'","'.$kat.'","'.$harga.'","'.$desk.'")');
			if($simpan){
				$select=mysql_query('select id_kamar from kamar where nama_kamar="'.$nama.'"
									and kelas_kamar="'.$kat.'"
									and harga_kamar="'.$harga.'"');
				$id=mysql_fetch_row($select);
				upload($id[0]);
			}
			else{
				echo "<script>alert('Data tidak berhasil disimpan! ".mysql_error()."');
						//document.location='../../?page=input_kamar';
						</script>";
			}
		}
		elseif($sub=='edit'){
			$idf=mysql_real_escape_string($_POST['ms']);
			if(empty($idf)){
				echo 	"<script>alert('Data tidak lengkap!');
						document.location='../../?page=edit_kamar&ms=".$idf."'
						</script>";
			}
			else{
				$simpan=mysql_query('update kamar set deskripsi_kamar="'.$desk.'" 
									, nama_kamar="'.$nama.'"
									, kelas_kamar="'.$kat.'"
									, harga_kamar="'.$harga.'"
									where id_kamar='.$idf);
				if($simpan){
					upload($idf);
				}
				else{
					echo mysql_error();
					echo "<script>alert('Data tidak berhasil disimpan!');
						document.location='../../?page=edit_kamar&ms=".$idf."';
						</script>";
					//echo $promosi.'a +++ '.$ket. ' +++ '.$sub.mysql_error();
				}
			}
		}
		else {
			echo'gagal '.$sub;
		}
	}
?>