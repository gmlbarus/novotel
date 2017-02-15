<div class='judul'>Testimonial</div>
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
			url: 'isi/kontrol/data-testimoni.php',
			dataType: 'json',
			colModel : [
				{display: 'No', name : 'no', width : 40, sortable : true, align: 'center'},
				{display: 'ID', name : 'id', width : 40, sortable : true, align: 'center', show: true},
				{display: 'Tanggal', name : 'Tanggal', width : 100, sortable : true, align: 'left'},
				{display: 'Username', name : 'Username', width : 100, sortable : true, align: 'left'},
				{display: 'Judul', name : 'Judul', width : 100, sortable : true, align: 'left'},
				{display: 'Isi', name : 'Isi', width : 140, sortable : true, align: 'left'},
				{display: 'Status', name : 'Status', width : 140, sortable : true, align: 'left'},
				],
			buttons : [
				{name: 'View', bclass: 'view', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				{name: 'Reply', bclass: 'edit', onpress : test},
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
				{display: 'Judul', name : 'Judul', isdefault: false},
				{display: 'Tanggal', name : 'Tanggal', isdefault: false},
				{display: 'Username', name : 'username', isdefault: true}
				],
			sortname: "id_Testimoni",
			sortorder: "desc",
			usepager: true,
			title: 'Testimonial',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 800,
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
			   url: "isi/kontrol/delete-testimoni.php",
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
	else if (com=='Reply')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=reply_testimoni&ms='+vdata;
				return false;
        }
		else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_testimoni&ms='+vdata;
				return false;
        } 
} 
</script>
<table id="flex1" style="display:none"></table>
</div>	
