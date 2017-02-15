			<div id="leftBar">
				<ul>
					<li><a href="?"><font color="#FFFFFF">Hotel Novotel</a></li></font>
					<li><a href="?page=galeri"><font color="#FFFFFF">Galery</a></li></font>
					<li><a href="?page=kalender"><font color="#FFFFFF">Calender</a></li></font>
				</ul>
			</div>
			
			<div id="rightContent">
				<h3>Gallery</h3>
				<div id="Gallery">					
					
<?php 
/** settings **/
	include 'isi/kontrol/get_image.php';
$images_dir = 'asset/images/galeri/';
$thumbs_dir = 'asset/images/galeri-thumbs/';
$thumbs_width = 300;
$images_per_row = 3;

/** generate photo gallery **/
$image_files = get_files($images_dir);
if(count($image_files)) {
	$index = 0;
	foreach($image_files as $index=>$file) {
		$index++;
		$thumbnail_image = $thumbs_dir.$file;
		if(!file_exists($thumbnail_image)) {
			$extension = get_file_extension($thumbnail_image);
			if($extension) {
				make_thumb($images_dir.$file,$thumbnail_image,$thumbs_width);
			}
		}
		echo '<a href="',$images_dir.$file,'" class="fancybox" rel="group"><img src="',$thumbnail_image,'" width="200"/></a>';
		if($index % $images_per_row == 0) { echo '<div class="clear"></div>'; }
	}
	echo '<div class="clear"></div>';
}
else {
	echo '<p>There are no images in this gallery.</p>';
}
?>
				</div>
			</div>
