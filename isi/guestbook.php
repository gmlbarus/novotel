<script>hljs.initHighlightingOnLoad();</script>
<script type="text/javascript" language="javascript" src="asset/js/jquery.textillate.js"></script>
<script type="text/javascript" language="javascript" src="asset/js/jquery.fittext.js"></script>
<script type="text/javascript" language="javascript" src="asset/js/jquery.lettering.js"></script>
<link href='http://fonts.googleapis.com/css?family=Rokkitt' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="asset/css/guest1.css"> 
<link rel="stylesheet" type="text/css" href="asset/css/animate.css"> 
			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=faq"><font color="#FFFFFF">FAQ</a></li></font>
					<li><a href="?page=guestbook"><font color="#FFFFFF">Guestbook</a></li></font>
				</ul>
			</div>
			<div id="rightContent">
				<h3>Guestbook</h3>
				<div class="playground grid">
					<div class="col-1-1 viewport">
						<div class="tlt">
							<ul class="texts" style="display: none">
								
                   
<?php include 'login/hub.php';
		$q=mysql_query('select nama, komentar from guestbook where status="show" order by id_guestbook desc');
		while($r=mysql_fetch_array($q)){
			echo "<li>".'"'.$r[1];
			echo '"'." ~ Oleh ".$r[0]."</li>";
		}
 ?>
							</ul>
						</div>
					</div>
				</div>
				
				<form method="post" action="isi/kontrol/simpan_guestbook.php">
				<table width="95%">
					<tr>
						<td width="125px"><b>Name	</b></td>
						<td>: <input type="text" name='nama' id='nama' class="sedang" maxlength='20' autofocus required placeholder='Nama...'/></td>
					</tr>
					<tr>
						<td width="125px"><b>Address	</b></td>
						<td>: <textarea type="text" name='alamat' id='alamat' width="400" maxlength='100' required placeholder='alamat...'></textarea></td>
					</tr>
					<tr>
						<td width="125px"><b>Email	</b></td>
						<td>: <input type="email" name='email'  class="sedang"  id='email' maxlength='20' required placeholder='email...'/></td>
					</tr>
					<tr>
						<td width="125px"><b>Phone	</b></td>
						<td>:<input type="number" name='phone'  class="sedang"  id='phone' maxlength='20' required placeholder='phone...' min="0"/></td>
					</tr>
					<tr>
						<td width="125px"><b>Comment	</b></td>
						<td>:<textarea type="komentar" name='komentar' id='nama' maxlength='300' required placeholder='komentar...'></textarea></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" class="button" name='submit' id='submit' value='submit'/>
							<input type="reset" class="button" name='reset' id='reset' value='reset'/>
						</td>
					</tr>
				</table>
				</form>
				<div class="col-1-1 controls" style="padding-right: 0">
              </div>
			</div>
	<script>
  $(function (){
    var log = function (msg) {
      return function () {
        if (console) console.log(msg);
      }
    }
    $('code').each(function () {
      var $this = $(this);
      $this.text($this.html());
    })

    var animateClasses = 'flash bounce shake tada swing wobble pulse flip flipInX flipOutX flipInY flipOutY fadeIn fadeInUp fadeInDown fadeInLeft fadeInRight fadeInUpBig fadeInDownBig fadeInLeftBig fadeInRightBig fadeOut fadeOutUp fadeOutDown fadeOutLeft fadeOutRight fadeOutUpBig fadeOutDownBig fadeOutLeftBig fadeOutRightBig bounceIn bounceInDown bounceInUp bounceInLeft bounceInRight bounceOut bounceOutDown bounceOutUp bounceOutLeft bounceOutRight rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut';

    var $form = $('.playground form')
      , $viewport = $('.playground .viewport');

    var getFormData = function () {
      var data = { 
        loop: true, 
        in: { callback: log('in callback called.') }, 
        out: { callback: log('out callback called.') }
      };
      
      $form.find('[data-key="effect"]').each(function () {
        var $this = $(this)
          , key = $this.data('key')
          , type = $this.data('type');

          data[type][key] = $this.val();
      });

      $form.find('[data-key="type"]').each(function () {
        var $this = $(this)
          , key = $this.data('key')
          , type = $this.data('type')
          , val = $this.val();

          data[type].shuffle = (val === 'shuffle');
          data[type].reverse = (val === 'reverse');
          data[type].sync = (val === 'sync');
      });

      return data;
    };

    $.each(animateClasses.split(' '), function (i, value) {
      var type = '[data-type]'
        , option = '<option value="' + value + '">' + value + '</option>';

      if (/Out/.test(value) || value === 'hinge') {
        type = '[data-type="out"]';
      } else if (/In/.test(value)) {
        type = '[data-type="in"]';
      } 

      if (type) {
        $form.find('[data-key="effect"]' + type).append(option);        
      }
    });

    $form.find('[data-key="effect"][data-type="in"]').val('fadeInLeftBig');
    $form.find('[data-key="effect"][data-type="out"]').val('hinge');

    $('.jumbotron h1')
      .fitText(0.5)
      .textillate({ in: { effect: 'flipInY' }});
    
    $('.jumbotron p')
      .fitText(3.2, { maxFontSize: 18 })
      .textillate({ initialDelay: 1000, in: { delay: 3, shuffle: true } });

    setTimeout(function () {
        $('.fade').addClass('in');
    }, 250);

    setTimeout(function () {
      $('h1.glow').removeClass('in');
    }, 2000);

    var $tlt = $viewport.find('.tlt')
      .on('start.tlt', log('start.tlt triggered.'))
      .on('inAnimationBegin.tlt', log('inAnimationBegin.tlt triggered.'))
      .on('inAnimationEnd.tlt', log('inAnimationEnd.tlt triggered.'))
      .on('outAnimationBegin.tlt', log('outAnimationBegin.tlt triggered.'))
      .on('outAnimationEnd.tlt', log('outAnimationEnd.tlt triggered.'))
      .on('end.tlt', log('end.tlt'));
    
   // $form.on('change', function () {
      var obj = getFormData();
      $tlt.textillate(obj);
    //}).trigger('change');

  });

	</script>