<div class='judul'>Pemesanan</div>
<br>
		<a href="" class="print" onclick="window.print()">Print</a>
<div id="rightContent">
<!-- tabel --------------------------------------->
<link rel="stylesheet" type="text/css" href="../asset/css/flexigrid.css" />
<script type="text/javascript" src="../asset/js/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="../asset/js/flexigrid.js"></script>
<!-- tabel --------------------------------------->
<script type="text/javascript">
$(document).ready(function(){
	
	$("#flex1").flexigrid
			(
			{
			url: 'isi/kontrol/data-pemesanan.php',
			dataType: 'json',
			colModel : [
				{display: 'ID Pemesanan', name : 'id', width : 100, sortable : true, align: 'center'},
				{display: 'ID Pelanggan', name : 'id_pelanggan', width : 100, sortable : true, align: 'center', show:true},
				{display: 'Konfirmasi', name : 'Status_Konfirmasi', width : 120, sortable : true, align: 'left'},
				{display: 'Pembayaran', name : 'Status_Pembayaran', width : 120, sortable : true, align: 'left'},
				{display: 'Nama', name : 'nama', width : 150, sortable : true, align: 'center'},
				{display: 'Username', name : 'username', width : 110, sortable : true, align: 'center'},
				{display: 'Jumlah pesan', name : 'jumlah_pesan', width : 80, sortable : true, align: 'center'},
				{display: 'Total bayar', name : 'total_bayar', width : 80, sortable : true, align: 'center'},		
				{display: 'Tgl Bayar', name : 'tgl_pembayaran', width : 80, sortable : true, align: 'center'},
				{display: 'Tgl check in', name : 'tanggal_check_in', width : 80, sortable : true, align: 'center'},
				{display: 'Tgl check out', name : 'tanggal_check_out', width : 80, sortable : true, align: 'center'},
				{display: 'No Hp', name : 'no hp', width : 100, sortable : true, align: 'center', show:true},								
				],
			buttons : [
				{name: 'View', bclass: 'view', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				{name: 'Cancel', bclass: 'cancel', onpress : test},
				{name: 'Confirm', bclass: 'confirm', onpress : test},
				{separator: true},
				/*{name: 'A', onpress: sortAlpha},
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
*/
				],
			searchitems : [
				{display: 'Status Konfirmasi', name : 'status_konfirmasi', isdefault: true},
				{display: 'Status Pembayaran', name : 'status_pembayaran'},
				{display: 'Total Bayar', name : 'total_bayar'},
				{display: 'Tanggal bayar', name : 'tgl_pembayaran'},
				{display: 'Tanggal Check In', name : 'tgl_check_in'},
				{display: 'Tanggal Check Out', name : 'tgl_check_out'},
				{display: 'ID Pemesanan', name : 'id_pemesanan'},
				{display: 'ID Pelanggan', name : 'pelanggan.id_pelanggan'},
				{display: 'Username', name : 'username'},				
				{display: 'Nama', name : 'nama'}	
				],
			sortname: "id_pemesanan",
			sortorder: "desc",
			usepager: true,
			title: 'Pemesanan Kamar',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 1100,
			height: 480
			}
			);   
	
});
function sortAlpha(com)
{ 
	jQuery('#flex1').flexOptions({newp:1, params:[{name:'letter_pressed', value: com},{name:'qtype',value:$('select[name=qtype]').val()}]});
	jQuery("#flex1").flexReload(); 
}

function test(com,grid)
{
    if (com=='Delete')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Delete ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/konfirmasi-pemesanan.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   }
			 });
			}
			} else {
				return false;
			}
			$("#flex1").flexReload();
        }
	else if (com=='Confirm')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Confirm ' + $('.trSelected',grid).length + ' orders?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/konfirmasi-pemesanan.php",
			   data: "confirm="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   
			   }
			 });
			}
			} else {
				return false;
			} 
			$("#flex1").flexReload();
        }
	else if (com=='Cancel')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Cancel ' + $('.trSelected',grid).length + ' orders?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/konfirmasi-pemesanan.php",
			   data: "cancel="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			 
			   }
			 });
			}
			} else {
				return false;
			} 
		  $("#flex1").flexReload();
        }	
	else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=detail_pemesanan&ms='+vdata;
				return false;
        }
} 
</script>
<table id="flex1" style="display:none"></table>
<pre> *Status pemesanan dan status pembayaran dapat dikonfirmasi apabila pelanggan telah melakukan konfirmasi pembayaran terlebih dahulu.</pre>
</div>
