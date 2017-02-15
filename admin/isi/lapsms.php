<div class='judul'>LAPORAN SMS</div>
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
			url: 'isi/kontrol/lapsms.php',
			dataType: 'json',
			colModel : [
				{display: 'ID Sms', name : 'id_sms', width : 20, sortable : true, align: 'center', show: true},
				{display: 'No Hp', name : 'no hp', width : 160, sortable : true, align: 'center'},
				{display: 'Status', name : 'status', width : 120, sortable : true, align: 'center'},
				{display: 'Jam', name : 'Jam', width : 160, sortable : true, align: 'center'},
				],
			searchitems : [
				{display: 'No HP', name : 'DestinationNumber', isdefault: true}
				],
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: 'Laporan sms',
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
</script>
<table id="flex1" style="display:none"></table>
</div>
