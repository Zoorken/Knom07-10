<?php include("incl/config.php");
if(userIsAuthenticated()){
	include('img/bmo/Class_Resize_Image.php');

	$target_dir = "img/bmo/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	 if($check !== false) {
		  echo "File is an image - " . $check["mime"] . ".";
		  $uploadOk = 1;
	 } else {
		  echo "File is not an image.";
		  $uploadOk = 0;
	 }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	 echo "Sorry, file already exists.";
	 $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	 $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	 echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		  echo $target_file;
		  
		  //
		  //Scale image
			$scale = Array(550, 250, 80);
			$dir = "img/bmo";
			$file = basename( $_FILES["fileToUpload"]["name"]);
			foreach($scale as $val) {

				$image = new Resize_Image;
				$image->ratio 			= true; 
				$image->save_folder = "img/bmo/"."$val/";

				$pathParts = pathinfo("$dir/$file");
				$extension = isset($pathParts['extension']) ? strtolower($pathParts['extension']) : '-';

				if(is_file("$dir/$file") && $extension != 'php') {	
					$image->image_to_resize = "$dir/$file";
					$image->new_image_name =$pathParts['filename'];
					if(!is_file($dir . "/" . $image->save_folder . $file)) {
						$image->new_width 	= $val;
						$image->new_height 	= (float)$val * 0.75;			
						$process = $image->resize();
						if($process['result']) {
							echo "<p>Created new image ({$process['new_file_path']}).";
						} else {
							echo "<p>Failed to resize image <code>$dir/$file</code>.";
						}
					} else {
						echo "<p>File exists, not converted: <code>{$image->save_folder}{$image->new_image_name}."; 
					}
				}		
			}
		  
		  
		  
	 } else {
		  echo "Sorry, there was an error uploading your file.";
	 }
	}
}
?>
<br></br>
<a href="http://www.student.bth.se/~frbd12/htmlphp/kmom07/Knom07-10/admin.php">Tillbaka</a>