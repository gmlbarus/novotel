<?php

@$isi = $_GET['page'];

switch ($isi) {
	// ------- about novotel 
	case "" : include "home.php";break;
	case "galeri" : include "galeri.php";break;
	case "award" : include "award.php";break;
	case "karir" : include "karir.php";break;
	case "kalender" : include "kalender.php";break;
 	// ------- location
	case "lokasi" : include "lokasi.php";break;	
	// ------- special & packages
	case "kamar" : include "kamar2.php";break;
	case "kamar2" : include "kamar2.php";break;
	case "detail_kamar" : include "detail_kamar.php";break;
	case "preview_pemesanan" : include "preview_pemesanan.php";break;
	case "fasilitas" : include "fasilitas.php";break;
	case "room_n_rate" : include "room_n_rate.php";break;
	case "special_order" : include "special_order.php";break;
	case "dinning_entertaiment" : include "dinning_entertaiment.php";break;
	case "activities" : include "activities.php";break;
	case "guest_service" : include "guest_service.php";break;
	// ------- customer service
	case "customer_servis" : include "customer_servis.php";break;
	case "faq" : include "faq.php";break;
	case "guestbook" : include "guestbook.php";break;
	// ------- promo
	case "promo" : include "promo.php";break;
	// ------- user
	case "signup" : include "member/signup.php";break;
	case "signin" : include "member/signin.php";break;
	case "member" : include "member/member.php";break;
	case "profile" : include "member/profile.php";break;
	case "password" : include "member/pswd.php";break;
	case "photo" : include "member/photo.php";break;
	case "edit" : include "member/edit.php";break;
	case "testimonial" : include "member/testimoni.php";break;
	case "detail_pemesanan" : include "member/detail_pemesanan.php";break;
	case "detail_pemakaian" : include "member/detail_pemakaian.php";break;
	case "transaction" : include "member/transaction.php";break;
	case "service" : include "member/service.php";break;
	// ------- info
	case "info" : include "info.php";break;
	
	default : printf("<h1>Broken Link!</h1>");
}
?>