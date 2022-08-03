<?php 

 function clear($data)
    {

        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);

        return $data;
    }