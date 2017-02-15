<script type="text/javascript" src="asset/js/zebra_datepicker.js"></script>
<link rel="stylesheet" href="asset/css/default.css" type="text/css">
<script type="text/javascript">
$(document).ready(function() {
	$('#tgl').Zebra_DatePicker({ show_week_number: 'Wk',
    always_visible: $('#show'),   direction: [1, false]});
	
	//function kirim(){document.forms.form.submit();alert();}
	function send(){
		var check = document.getElementsByClassName('dp_selected');
		if(check=='' || check=='undefined'){
		alert('uuuuuu');
		}
		else if(check!=''){
			string = [].map.call( check, function(node){
				return node.textContent || node.innerText;
			}).join('');
			check=undefined;
			if(string!='' && string!=undefined){
				string=undefined;
				document.forms.form.submit();
				document.forms.form.reset();
				
			}
		}
	}
	setInterval (send, 1000);
}); 
</script>
			<div id="leftBar">
				<ul>
					<li><a href="?"><font color="#FFFFFF">Hotel Novotel</a></li></font>
					<li><a href="?page=galeri"><font color="#FFFFFF">Galery</a></li></font>
					<li><a href="?page=kalender"><font color="#FFFFFF">Calender</a></li></font>
				</ul>
			</div>
			
			<div id="rightContent">
				<h3>Calender</h3>
				<text class="teks"><b>Hotel Novotel adalah Hotel terbaik di Seluruh Dunia</text></b>
				<form method="get" id="form" action="?page=kamar">
					<input type="hidden" name="page" value="kamar">
					<input type="hidden" id="tgl" name="tgl" oncha.nge='alert("ahahah");' required/>
					<div id="show"></div>
				</form>
				
			</div>
