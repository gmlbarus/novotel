<div class='judul'>Kamar</div>
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
			url: 'isi/kontrol/data-Kamar.php',
			dataType: 'json',
			colModel : [
				{display: 'No', name : 'no', width : 80, sortable : true, align: 'center'},
				{display: 'ID', name : 'id', width : 400, sortable : true, align: 'center', show: true},
				{display: 'Foto', name : 'Foto', width : 200, sortable : true, align: 'center'},
				{display: 'Nama Kamar', name : 'Nama Kamar', width : 140, sortable : true, align: 'left'},
				{display: 'Kelas', name : 'Kelas Kamar', width : 150, sortable : true, align: 'left'},
				{display: 'Harga', name : 'Harga Kamar', width : 150, sortable : true, align: 'left'},
				{display: 'Deskripsi', name : 'Deskripsi Kamar', width : 480, sortable : true, align: 'left'},
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test},
				{name: 'View', bclass: 'view', onpress : test},
				{name: 'Edit', bclass: 'edit', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
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
				{display: 'Kelas', name : 'kelas_Kamar', isdefault: false},
				{display: 'Harga', name : 'Harga_Kamar', isdefault: false},
				{display: 'Kamar', name : 'Nama_Kamar', isdefault: true}
				],
			sortname: "id_Kamar",
			sortorder: "asc",
			usepager: true,
			title: 'Kamar',
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
			   url: "isi/kontrol/delete-Kamar.php",
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
				
					document.location='?page=edit_kamar&ms='+vdata;
				return false;
        }
    else if (com=='Add')
        {
            document.location='?page=input_kamar';
        }  

else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_kamar&ms='+vdata;
				return false;
        }      		
} 
</script>
<table id="flex1" style="display:none"></table>
</div>	
