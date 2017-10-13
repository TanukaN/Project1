<?php 
	class htmlTable extends page
    {
        public function get() {
            $csv = $_GET['filename'];
            chdir('uploads');
            $file = fopen($csv,"r");
            $this->html .= htmlTags::tableFormat();
            $row = 1;
            while (($data=fgetcsv($file))!== FALSE){
                foreach($data as $value) {
                    if ($row == 1) {
                        $this->html .= htmlTags::tableHeadFont($value);
                    }else{
                        $this->html .= htmlTags::tableContent($value);
                    }
                }
                $row++;
                echo("</tr>");
            }
            echo("</table>");
            fclose($file);
        }
    }
?>
