<?php
    
    echo "<div id='EXIF'>";
            
                        
        $filename = "image_test.jpg";


        $exif = exif_read_data($filename, 'IFD0');

        echo $exif===false ? "Aucun en-tête de donnés n'a été trouvé.<br />\n" : "L'image contient des en-têtes<br />\n";
        $exif = exif_read_data($filename, 0, true);

                            
        echo "<div id='infosEXIF'>";
                
        foreach ($exif as $key => $section)
            {
            foreach ($section as $name => $val)
            {
                
                    try
                    {
                        echo "$key.$name: $val<br />\n";
                    }
                    catch(Exception $e)
                    {
                    
                    }
                    
            }
            }
                            
            echo "</div>";
                        
    echo "</div>";

?>