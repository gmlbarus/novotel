<div class='judul'>Pembayaran Servis</div>
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
			url: 'isi/kontrol/data-pservis.php',
			dataType: 'json',
			colModel : [
				{display: 'ID Pemakaian', name : 'id_pemakaian', width : 100, sortable : true, align: 'center'},
				{display: 'Id pelanggan', name : 'id_pelanggan', width : 80, sortable : true, align: 'center', show: true},
				{display: 'Username', name : 'Username', width : 240, sortable : true, align: 'left'},
				{display: 'Nama Pelanggan', name : 'Nama Pelanggan', width : 240, sortable : true, align: 'left'},
				{display: 'Tanggal Transaksi', name : 'tgl_bayar', width : 220, sortable : true, align: 'left'},
				{display: 'Total Transaksi', name : 'total_bayar', width : 220, sortable : true, align: 'right'},
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test},
				{name: 'Edit', bclass: 'edit', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				{name: 'View', bclass: 'view', onpress : test},
				//{name: 'Print', bclass: 'print', onpress : test},
				/*{separator: true},
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
*/
				],
			searchitems : [
				{display: 'ID Pemakaian', name : 'id_pemakaian'},
				{display: 'ID Pelanggan', name : 'id_pelanggan'},
				{display: 'Username', name : 'username'},
				{display: 'Nama Pelanggan', name : 'nama'},
				{display: 'Total Pembayaran', name : 'total_bayar'},
				{display: 'Tanggal Pembayaran', name : 'tgl_bayar', isdefault: true}
				],
			sortname: "id_pemakaian",
			sortorder: "asc",
			usepager: true,
			title: 'Pemakaian Servis',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 1100,
			height: 255
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
			   url: "isi/kontrol/delete-pservis.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   $("#flex1").flexReload();
			   }
			 });
			}
			} else {
				return false;
			} 
        }
	else if (com=='Edit')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=edit_pemakaian&ms='+vdata;
				return false;
        }
    else if (com=='Add')
        {
            document.location='?page=input_pemakaian';
        } 
	else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_pemakaian&ms='+vdata;
				return false;
        }
	else if (com=='Print')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Print ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/print-pservis.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Printed rows: "+data.total);
			   $("#flex1").flexReload();
			   }
			 });
			}
			} else {
				return false;
			} 
        }
} 
if($('td#flex1').addClass('cure').siblings()){//alert();
}
</script>
<table id="flex1" style="display:none"></table>
</div>
