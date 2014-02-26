<?php

class DocumentsModel extends Eloquent 
{
	public static function getFiles($location = "") 
	{
		//Where all the file is
		$origin = "../app/storage/file/";

		//Block hack ^^
        if (!is_dir($origin.$location)) {
        	return [];
        }

        $handler = opendir($origin.$location);

        //Get all the file
        $listFile = [];
		while ($file = readdir($handler)) {
			if ($file != ".") {
            	$listFile[] = [
            		'name' => $file, 
            		'type' => (is_file($origin.$file)) ? "file" : "folder",
            		'location' => ($file == "..") ? str_replace(strrchr($location, '/'), "", $location) : "{$location}/{$file}/",
            	];
            }
		}
 		
 		//Sort the file
		$listFile = array_values(array_sort($listFile, function($value)
		{
			$type = ($value['type'] == "file") ? "b" : "a";
		    return $type.$value['name'];
		}));

		return $listFile;
	}
}