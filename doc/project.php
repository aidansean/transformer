<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/transformer" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=transformer" ;
$project = new project_object("transformer", "Image transformer", "https://github.com/aidansean/transformer", "http://aidansean.com/projects/?tag=transformer", "transformer/images/project.jpg", "transformer/images/project_bw.jpg", "When I discovered I could manipulate images with PHP one of the first things I wanted to do was perform coordinate transformations.  They have fascinated me since I first came across them and so I developed this project to satifsy my curiosity about what a skyline might look like when transformed into polar coordinates.", "Images,Maths", "HTML,PHP") ;
?>