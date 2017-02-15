<div class='judul'>Pelanggan</div>
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
			url: 'isi/kontrol/data-pelanggan.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 20, sortable : true, align: 'center'},
				{display: 'Foto', name : 'Foto', width : 85, sortable : true, align: 'center'},
				{display: 'Nama', name : 'nama', width : 150, sortable : true, align: 'center'},
				{display: 'Username', name : 'username', width : 140, sortable : true, align: 'center'},
				{display: 'Pekerjaan', name : 'pekerjaan', width : 140, sortable : true, align: 'center'},
				{display: 'Jenis Kelamin', name : 'jenis kelamin', width : 80, sortable : true, align: 'left'},	
				{display: 'Tanggal Lahir', name : 'tanggal lahir', width : 80, sortable : true, align: 'center'},
				{display: 'No Hp', name : 'no hp', width : 160, sortable : true, align: 'center'},
				{display: 'Email', name : 'email', width : 120, sortable : true, align: 'center'},
				{display: 'Poin', name : 'poin', width : 50, sortable : true, align: 'center'},
				{display: 'Alamat', name : 'Alamat', width : 240, sortable : true, align: 'center'},
				
				
				
				],
			buttons : [
				{name: 'View', bclass: 'view', onpress : test},
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
				{display: 'Username', name : 'username'},
				{display: 'Pekerjaan', name : 'pekerjaan'},
				{display: 'Alamat', name : 'alamat'},
				{display: 'Poin', name : 'poin'},
				{display: 'Jenis Kelamin', name : 'jenis_kelamin'},
				{display: 'Nama', name : 'nama', isdefault: true}
				],
			sortname: "id_pelanggan",
			sortorder: "asc",
			usepager: true,
			title: 'Pelanggan',
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
			   url: "isi/kontrol/delete-pelanggan.php",
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
	/*else if (com=='Edit')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=edit_pelanggan&ms='+vdata;
				return false;
        }
    else if (com=='Add')
        {
            document.location='?page=input_pelanggan';
        }*/
else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_pelanggan&ms='+vdata;
				return false;
        }		
} 
</script>
<table id="flex1" style="display:none"></table>
</div>
