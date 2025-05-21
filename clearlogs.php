
<?php	//header('Content-Type: text/html; charset=utf-8');
						
		 mb_internal_encoding("UTF-8");

	//date_default_timezone_set("Asia/Tokyo"); 
		
		



		
		 $date = date('Y-m-d', strtotime('-13 month'));
	  
	  
	    $dirname = 'log-'.date('Y-m',strtotime($date)).'';
		
		
		$dir='/var/www/vhosts/ikko21.com/httpdocs/_demo2/application/logs/'.$dirname.'/';
	//	print_r(glob($dir."*.*"));
		
		foreach(glob($dir."*.*") as $v){
		//	echo $v;
		unlink($v);
		
		}
		
		rmdir($dir);
		
		
		 $date2 = date('Y-m-d', strtotime('-14 month'));
		
		 $dirname2 = 'log-'.date('Y-m',strtotime($date2)).'';
		
		$dir2='/var/www/vhosts/ikko21.com/httpdocs/_demo2/application/logs/'.$dirname2.'/';
	//	print_r(glob($dir2."*.*"));
		
		foreach(glob($dir2."*.*") as $v2){
			//echo $v;
		unlink($v2);
		
		}
		
		rmdir($dir2);
		
		
		
		
		
		
		
		
	  
	  
	  
		
		
		

	

	

		
?>







