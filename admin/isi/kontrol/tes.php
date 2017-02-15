<form id="form1" name="form1" method="post" action="">
 <label>
 <input name="sum[]" type="text" id="sum[]" value="490" size="2" />
 </label>
 
 <label>
 <input name="sum[]" type="text" id="sum[]" value="3" size="2" />
 </label>
 
 <label>
 <input name="sum[]" type="text" id="sum[]" value="2" size="2" />
 </label>
 
 <input name="jumlah" type="button" value="Jumlah" onclick="javascript:addsum()" />
 <input type="text" name="harga[]"  id="harga" min="0" step="100" placeholder="Harga" required style="text-align: right;"/>
 <span id="total"></span>
</form>
 <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script language="javascript">
function addsum(){
 var tot=0;
 var count = document.getElementsByName('sum[]');
 var counts = document.getElementsByName('harga[]');
 alert(counts);
	for(i=0; i<count.length; i++){
 tot = tot + parseInt(count[i].value);
 }
 tot=tot+parseInt(counts[0].value);
 document.getElementById('total').innerHTML='Total = '+tot;
 
}
</script>