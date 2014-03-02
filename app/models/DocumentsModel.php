<?php

class DocumentsModel extends Eloquent 
{
	public static function getFiles($location = "") 
	{
		//Where all the file is
		$origin = "../app/storage/file";

		//Block hack ^^
        if (!is_dir($origin.$location)) {
        	return [];
        }

        $handler = opendir($origin.$location);

        //Get all the file
        $listFile = [];
		while ($file = readdir($handler)) {
			if ($file != ".") {
				$nbDownload = DB::table('fichierlu')->where('fichier', "{$location}/{$file}")->count();

            	$listFile[] = [
            		'name' => $file, 
            		'type' => (is_file($origin.$location.'/'.$file)) ? "file" : "folder",
            		'location' => ($file == "..") ? str_replace(strrchr($location, '/').'/', "", $location.'/') : "{$location}/{$file}",
            		'nbDownload' => $nbDownload,
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

	public static function createFile($name, $location)
	{
		//Where all the file is
		$origin = "../app/storage/file/";

		$dir = $origin.$location.'/'.$name;

		if (!file_exists($dir)) {
			mkdir($dir);
			return true;
		} else {
			return false;
		}
	}

	public static function deleteFile($location)
	{
		//Where all the file is
		$origin = "../app/storage/file/";

		$dir = $origin.$location;

		if (is_dir($dir)) {
			return DocumentsModel::deleteDirectory($dir);
		} elseif (is_file($dir)) {
			DB::table('fichierlu')->where('fichier', $location)->delete();
			unlink($dir);
			return true;
		} else {
			return false;
		}
	}

	public static function addFile($location, $file)
	{
		//Where all the file is
		$origin = "../app/storage/file/";

		$dir = $origin.$location;

		$file->move($dir, $file->getClientOriginalName());
	}

	public static function downloadFile($location, $user)
	{
		var_dump($location);
		var_dump($user);

		DB::table('fichierlu')->insert(['courriel' => $user, 'fichier' => $location, 'date' => date('Y-m-d')]);
	}

	public static function getInfoDownloadFile($location) {
		return DB::table('fichierlu')->where('fichier', $location)->get();
	}

	private static function deleteDirectory($dir) {
	    if (!file_exists($dir)) return true;
	    if (!is_dir($dir)) return unlink($dir);
	    foreach (scandir($dir) as $item) {
	        if ($item == '.' || $item == '..') continue;
	        if (!DocumentsModel::deleteDirectory($dir.DIRECTORY_SEPARATOR.$item)) return false;
	    }
	    return rmdir($dir);
	}
}