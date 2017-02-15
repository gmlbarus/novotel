<?php

@$isi = $_GET['page'];

switch ($isi) {
	
	case "" : include "pemesanan.php";break;
	case "input_faq" : include "inputfaq.php";break;
	case "edit_faq" : include "editfaq.php";break;
	case "faq" : include "faq.php";break;
	case "view_faq" : include "view_faq.php";break;
	
	case "promosi" : include "promosi.php";break;
	case "input_promosi" : include "inputpromosi.php";break;
	case "edit_promosi" : include "editpromosi.php";break;	
	case "send_promosi_pelanggan" : include "sendpromosi-pelanggan.php";break;
	case "send_promosi_guest" : include "sendpromosi-guest.php";break;
	case "view_promosi" : include "view_promosi.php"; break;
	
	case "servis" : include "servis.php";break;
	case "input_servis" : include "inputservis.php";break;
	case "edit_servis" : include "editservis.php";break;
	case "view_servis" : include "view_servis.php";break;
	
	case "kamar" : include "kamar.php";break;
	case "kamar2" : include "kamar2.php";break;
	case "input_kamar" : include "inputkamar.php";break;
	case "edit_kamar" : include "editkamar.php";break;
	case "view_kamar" : include "view_kamar.php";break;
	
	case "customer-level" : include "cl.php";break;
	case "input_cl" : include "inputcl.php";break;
	case "edit_cl" : include "editcl.php";break;
	case "view_cl" : include "view_cl.php";break;
	
	case "testimoni" : include "testimoni.php";break;
	case "input_testimoni" : include "inputtestimoni.php";break;
	case "reply_testimoni" : include "replytestimoni.php";break;
	case "view_testimoni" : include "view_testimoni.php";break;
	
	case "pengguna" : include "pengguna.php";break;
	case "input_pengguna" : include "inputpengguna.php";break;
	case "edit_pengguna" : include "editpengguna.php";break;
	
	case "pelanggan" : include "pelanggan.php";break;
	case "view_pelanggan" : include "view_pelanggan.php";break;
	
	case "username" : include "username.php";break;
	case "password" : include "password.php";break;
	
	
	case "guestbook" : include "guestbook.php";break;
	case "view_guestbook" : include "view_guestbook.php";break;
	
	case "pembayaran-servis" : include "bayarservis.php";break;
	case "input_pemakaian" : include "inputpemakaian.php";break;
	case "view_pemakaian" : include "viewpemakaian.php";break;
	case "edit_pemakaian" :include "editpemakaian.php";break;
	case "simpan_pemakaian" : include "simpan_pemakaian.php";break;
	
	case "pemesanan" : include "pemesanan.php";break;
	case "detail_pemesanan" : include "detail_pemesanan.php";break;
	
	case "promo" : include "promo.php";break;
	
	case "laporan-kamar" : include "lapkamar.php";break;
	case "laporan-pemesanan" : include "lappesan.php";break;
	case "laporan-pelanggan" : include "lappelanggan.php";break;
	case "view_kamar" : include "view_kamar.php";break;
	
	case "sms" : include "sms.php";break;
	case "laporan-sms" : include "lapsms.php";break;
	default : printf("<h1>Broken Link!</h1>");
}
?>