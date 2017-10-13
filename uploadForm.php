<?php
        class uploadForm extends page
        {
            public function get()
            {
                $form = '<form action="index.php?page=uploadForm" method="POST" enctype="multipart/form-data">';
                $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
                $form .= '<input type="submit" value="Upload CSV" name="submit">';
                $form .= '</form>';
                $this->html .= htmlTags::headingOne('Upload Form');
                $this->html .= $form;
            }
            public function post() {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . $_FILES["fileToUpload"]["name"];
                    $filename = $_FILES["fileToUpload"]["name"];

                    if (file_exists($target_file)) {
                        unlink($target_file);
                    }
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        //echo "The file " . $filename . " has been uploaded.";
                        header("Location: index.php?page=htmlTable&filename=$filename");
                    /*} else {
                        echo "Sorry, there was an error uploading your file.";*/
                    }
            }

        }
?>
