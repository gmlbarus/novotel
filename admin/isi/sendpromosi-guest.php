<div class='judul'>Kirim Promosi</div>
<div id="rightContent">
<!-- tabel --------------------------------------->
<link rel="stylesheet" type="text/css" href="../asset/css/flexigrid.css" />
<script type="text/javascript" src="../asset/js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../asset/js/flexigrid.js"></script>
<!-- tabel --------------------------------------->
<?php 
if(empty($_SESSION['admin-limas'])){
	echo "<script>document.location='?page=promosi'</script>";
}
elseif(empty($_GET['ms'])){
	echo "<script>document.location='?page=promosi'</script>";
}
else{
	$ms=mysql_real_escape_string($_GET['ms']);
	$cek=mysql_query('select * from promosi where id_promosi='.$ms);
	if(count($cek)==0){
		echo "<script>alert('Data promosi tidak ditemukan');document.location='?page=promosi'</script>";
	}
}


?>
<script type="text/javascript">
$(document).ready(function(){
	
	$("#flex2").flexigrid
			(
			{
			url: 'isi/kontrol/data-kontak-guest.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 240, sortable : true, align: 'center', hide: true},
				{display: 'No', name : 'no', width : 40, sortable : true, align: 'center'},
				{display: 'No HP', name : 'no_hp', width : 120, sortable : true, align: 'left'},
				{display: 'Nama Calon Pelanggan', name : 'nama', width : 170, sortable : true, align: 'left'},	
				],
			buttons : [
				{name: 'Send', bclass: 'send', onpress : test},
				{name: 'Send To All', bclass: 'send toall', onpress : test},
				{separator: true},
				{name: 'A', onpress: sortAlpha},
                {name: 'B', onpress: sortAlpha},
				{name: 'C', onpress: sortAlpha},
				{name: 'D', onpress: sortAlpha},
				{name: 'E', onpress: sortAlpha},
				{name: 'F', onpress: sortAlpha},
				{name: 'G', onpress: sortAlpha},
				{name: 'H', onpress: sortAlpha},
				{name: 'I', onpress: sortAlpha},
				{name: 'J', onpress: sortAlpha},
				{name: 'K', onpress: sortAlpha},
				{name: 'L', onpress: sortAlpha},
				{name: 'M', onpress: sortAlpha},
				{name: 'N', onpress: sortAlpha},
				{name: 'O', onpress: sortAlpha},
				{name: 'P', onpress: sortAlpha},
				{name: 'Q', onpress: sortAlpha},
				{name: 'R', onpress: sortAlpha},
				{name: 'S', onpress: sortAlpha},
				{name: 'T', onpress: sortAlpha},
				{name: 'U', onpress: sortAlpha},
				{name: 'V', onpress: sortAlpha},
				{name: 'W', onpress: sortAlpha},
				{name: 'X', onpress: sortAlpha},
				{name: 'Y', onpress: sortAlpha},
				{name: 'Z', onpress: sortAlpha},
				{name: '#', onpress: sortAlpha}

				],
			searchitems : [
				{display: 'No Hp', name : 'no_hp'},
				{display: 'Nama', name : 'nama', isdefault: true}
				],
			sortname: "id_guestbook",
			sortorder: "asc",
			usepager: true,
			title: 'Calon Pelanggan',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 750,
			height: 255
			}
			);   
	
});
function sortAlpha(com)
{ 
	jQuery('#flex2').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
	jQuery("#flex2").flexReload(); 
}

function test(com,grid)
{
    if (com=='Send')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Sending to ' + $('.trSelected',grid).length + ' guests?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			alert("Mengirim promosi ke no : "+itemlist);
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/send-promosi.php",
			   data: "itemguest="+itemlist+"&id_faq=<?php echo $ms;?>",
			   success: function(data){
			   alert(" Sukses : "+data.sukses+" customers");
			   alert(" Error : "+data.pesan+" customers");
			   alert(" Sending to : "+data.total+" customers");
			   $("#flex2").flexReload();
			   }
			 });
			}
			} else {
				return false;
			} 
        }
		if (com=='Send To All')
        {
		   if(confirm('Sending to all guest?')){
            $.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/send-promosi.php",
			   data: "sendguest=all",
			   success: function(data){
			   	 alert(" Sukses : "+data.sukses+" customers");
			   alert(" Error : "+data.pesan+" customers");
			   alert(" Sending to : "+data.total+" customers");
			   $("#flex2").flexReload();
			   }
			 });
			}
        }
} 
</script><br/>
<a href="?page=send_promosi_pelanggan&ms=<?php echo $ms?>">Lihat data kontak pelanggan</a>
<table id="flex2" style="display:none"></table>
</div>
