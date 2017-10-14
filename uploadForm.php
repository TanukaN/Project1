<?php
    class uploadForm extends page
    {
        public function get() {                          //The get function displays the Upload Form and requests input from the user.
            $form = '<form action="index.php?page=uploadForm" method="POST" enctype="multipart/form-data">';
            $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
            $form .= '<input type="submit" value="Upload CSV" name="submit">';
            $form .= '</form>';
            $this->html .= htmlTags::headingOne('Upload Form');
            $this->html .= $form;
        }
        public function post() {                         //The target directory is specified.
            $target_dir = "uploads/";
            $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
            $filename = $_FILES["fileToUpload"]["name"];

        /*************If the uploaded file already exists, it will be deleted from the directory.**********/
            if (file_exists($target_file)) {
                unlink($target_file);
            }

	/***********If the file is saved in the 'uploads' directory successfully, the user is redirected to another page.************/
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                header("Location: index.php?page=htmlTable&filename=$filename");
            }

	/***********Alternatively, we can display to user that the file has been successfully uploaded,********/
	/***********and then redirect to another path with a 5 second delay************************************/

	/*  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                stringFunctions::printThis("The file " . $filename . "has been uploaded.");
                header("Refresh: 5; url= index.php?page=htmlTable&filename=$filename");
            } else {
                stringFunctions::printThis("Sorry, there was an error uploading your file.");
	    }    */
	}
    }
?>
