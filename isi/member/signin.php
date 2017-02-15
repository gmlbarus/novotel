<?php if(isset($_GET['pesan']) and $_GET['pesan']==1) {
	echo '<script>alert("Silahkan mendaftar atau login terlebih dahulu!");</script>';
}?>

			<div id="leftBar" style="background: url(img/bg_kiri.png) repeat-y;">
				<ul>
					<li><a href="?page=faq"><font color="#FFFFFF">FAQ</a></li>
					<li><a href="?page=guestbook"><font color="#FFFFFF">Guestbook</a></li>
				</ul>
			</div>
			<div id="rightContent">
				<div id="loginForm">
					<div class="headLoginForm">
					<font color="#222">Login Member
					</div>
					<div class="fieldLogin">
						<form method="POST" action="isi/member/sign.php">
							<label>Username</label><br>
								<input type="text" class="login" name="un" id="un" autofocus required placeholder="Username Tanpa Spasi"><br>
							<label>Password</label><br>
								<input type="password" class="login" name="pass" id="pass" required placeholder="Password"><br>
								<input type="hidden" name="aksi" id="aksi" class="button" value="signin">
								<input type="hidden" name="pesan" id="pesan" class="button" value="<?php echo @$_GET['pesan'];?>">
								<input type="submit" class="button" value="Login">
								<br />
							<label>Belum terdaftar? </label><a href="?page=signup&pesan=1"> Daftar disini!</a><br>
						</form>
						
					</div>
				</div>
			</div>
