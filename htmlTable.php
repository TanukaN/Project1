<?php
    class htmlTable extends page {                          //This class displays the uploaded csv file in a tabular format
        public function get() {
            $csv = $_GET['filename'];
            chdir('uploads');                                     //change the directory to 'uploads' to read the file
            $file = fopen($csv,"r");
            htmlTags::tableFormat();               //call tableFormat() function from htmlTags class for table display
            $row = 1;
            while (($data=fgetcsv($file))!== FALSE){    //while and for loops used to loop through 2-dimensional array
                foreach($data as $value) {
                    if ($row == 1) {
                        htmlTags::tableHeader($value);
                    }else{
                        htmlTags::tableContent($value);
                    }
                }
                $row++;
                htmlTags::breakTableRow();
            }
            fclose($file);
        }
    }
?>
