

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Upload with resize</title>
<meta name="description" content="PHP image upload with resize, demo page." />

<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	color: #333333;
	font-size: 12px;
}

.upload_message_success {
	padding:4px;
	background-color:#009900;
	border:1px solid #006600;
	color:#FFFFFF;
	margin-top:10px;
	margin-bottom:10px;
}

.upload_message_error {
	padding:4px;
	background-color:#CE0000;
	border:1px solid #990000;
	color:#FFFFFF;
	margin-top:10px;
	margin-bottom:10px;
}

-->
</style></head>

<body>

<h1 style="margin-bottom: 0px">Submit an image</h1>


                    <div class="upload_message_success">
            image uploaded            </div>
		

<form action="submit.php" method="post" enctype="multipart/form-data" name="image_upload_form" id="image_upload_form" style="margin-bottom:0px;">
<label>Image file, maximum 4MB. it can be jpg, gif,  png:</label><br />
          <input name="image_upload_box" type="file" id="image_upload_box" size="40" />
          <input type="submit" name="submit" value="Upload image" />     
     
     <br />
	<br />

     
      <label>Scale down image? (2592 x 1944 px max):</label>
      <br />
      <input name="max_width_box" type="text" id="max_width_box" value="1024" size="4">
      x      
      
      <input name="max_height_box" type="text" id="max_height_box" value="768" size="4">
      px.
      <br />
      <br />
      <p style="padding:5px; border:1px solid #EBEBEB; background-color:#FAFAFA;">
      <strong>Notes:</strong><br />
  The image will not be resized to this exact size; it will be scalled down so that neider width or height is larger than specified.<br />
  When uploading this script make sure you have a directory called &quot;image_files&quot; next to it and make that directory writable, permissions 777.<br />
  After you uploaded images and made tests on our server please <a href="delete_all_images.php">delete all uploaded images </a> :)<br />
  </p>

      

<input name="submitted_form" type="hidden" id="submitted_form" value="image_upload_form" />
          </form>




<p>
	<img src="image_files/najlepse-slike-macaka-0.jpg" />
</p>




</body>
</html>