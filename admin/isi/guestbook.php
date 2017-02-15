<div class='judul'>guestbook</div>
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
			url: 'isi/kontrol/guestbook-data.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 20, sortable : true, align: 'center', hide: true},
				{display: 'nama', name : 'nama', width : 80, sortable : true, align: 'center'},
				{display: 'status', name : 'status', width : 80, sortable : true, align: 'center'},
				{display: 'alamat', name : 'alamat', width : 80, sortable : true, align: 'center'},
				{display: 'pekerjaan', name : 'pekerjaan', width : 80, sortable : true, align: 'center'},
				{display: 'email', name : 'email', width : 80, sortable : true, align: 'center'},
				{display: 'no telp', name : 'no_telp', width : 80, sortable : true, align: 'left'},
				{display: 'komentar', name : 'komentar', width : 240, sortable : true, align: 'center'}
	
				],
			buttons : [
				{name: 'Show', bclass: 'show', onpress : test},
				{name: 'Hide', bclass: 'hide', onpress : test},
				{name: 'Delete', bclass: 'delete', onpress : test},
				{name: 'View', bclass: 'view', onpress : test},
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
				{display: 'pekerjaan', name : 'pekerjaan'},
				{display: 'status', name : 'status'},
				{display: 'alamat', name : 'alamat'},
				{display: 'nama', name : 'nama', isdefault: true}
				],
			sortname: "id_guestbook",
			sortorder: "asc",
			usepager: true,
			title: 'guestbook',
			useRp: true,
			rp: 10,
			showTableToggleBtn: true,
			width: 700,
			height: 255
			}
			);  
 
	setInterval (jQuery("#flex1").flexReload(), 1000);
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
			   url: "isi/kontrol/guestbook-delete.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   }
			 });
			}
			} else {
				return false;
			} 
			jQuery("#flex1").flexReload(); 
        }
	else if (com=='Show')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Show ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/guestbook-show.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   
			   }
			 });
			}
			
			} else {
				return false;
			} 
			jQuery("#flex1").flexReload(); 
        }
    else if (com=='Hide')
        {
           if($('.trSelected',grid).length>0){
		   if(confirm('Hide ' + $('.trSelected',grid).length + ' items?')){
            var items = $('.trSelected',grid);
            var itemlist ='';
        	for(i=0;i<items.length;i++){
				itemlist+= items[i].id.substr(3)+",";
			}
			$.ajax({
			   type: "POST",
			   dataType: "json",
			   url: "isi/kontrol/guestbook-hide.php",
			   data: "items="+itemlist,
			   success: function(data){
			   	alert(" Total affected rows: "+data.total);
			   }
			 });
			}
			
			} else {
				return false;
			} 
			jQuery("#flex1").flexReload(); 
        }   
	else if (com=='View')
        {
				var items = $('.trSelected',grid);
				var items = $('.trSelected',grid);
				var vdata=items[0].id.substr(3);
				
					document.location='?page=view_guestbook&ms='+vdata;
				return false;
        }
} 
</script>
<table id="flex1" style="display:none"></table>
</div>
