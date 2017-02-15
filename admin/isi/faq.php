<div class='judul'>frequently ask question</div>
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
			url: 'isi/kontrol/data-faq.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 240, sortable : true, align: 'center', show: true},
				{display: 'Pertanyaan', name : 'isi_faq', width : 240, sortable : true, align: 'center'},
				{display: 'Solusi', name : 'solusi', width : 240, sortable : true, align: 'left'},
	
				],
			buttons : [
				{name: 'Add', bclass: 'add', onpress : test},
				{name: 'View', bclass: 'view', onpress : test},
				{name: 'Edit', bclass: 'edit', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				
				{separator: true},
				
				],
			searchitems : [
				{display: 'Pertanyaan', name : 'isi_faq'},
				{display: 'Solusi', name : 'solusi', isdefault: true}
				],
			sortname: "id_faq",
			sortorder: "asc",
			usepager: true,
			title: 'User',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
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
			   url: "isi/kontrol/delete-faq.php",
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
				
					document.location='?page=edit_faq&ms='+vdata;
				return false;
        }
    else if (com=='Add')
        {
            document.location='?page=input_faq';
           
        }  
else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_faq&ms='+vdata;
				return false;
        }
else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_faq&ms='+vdata;
				return false;
        }		
} 
</script>
<table id="flex1" style="display:none"></table>
</div>
