
<?php

if (!unlink('cv_resume/heel.png')) { 
    echo ("cannot be deleted due to an error"); 
} 
else { 
    echo ("has been deleted"); 
} ?>