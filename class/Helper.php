<?php
	/*
	!===========================================
	! 				Helper Class
	!============================================
	 */
	class Helper 
	{
		private $db;

		/*
		@ class constructor
		*/
	    public function __construct()
	    {
	    	global $db;
	    	$this->db = new Database;
	        
	    }


	    /*
    !---------------------------------
    ! data validation
    !---------------------------------
    */
    function validation($data)
    {
      $data = htmlspecialchars($data);
      $data = stripcslashes($data);
      $data = trim($data);
      return $data;
    }

    /*
    !---------------------------------
    ! base url
    !---------------------------------
    */
    function base_url() 
    {
        $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
        $base_url .= "://". @$_SERVER['HTTP_HOST'];
        $base_url .=     str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
        // echo rtrim($base_url,'/'); die;
        return $base_url;
    }

	/*
    ------------------------------------------------
    !dynamic page title
    !-------------------------------------------------
    */
    function dynamicPageTitle($user="Admin")
    {
    	$path_array = $_SERVER['PHP_SELF'];
        //return $path_array;
    	$explode = explode('/', $path_array);
    	//echo '<pre>';
    	//print_r($_SERVER); die;
        unset($explode[0]); //delete empty array value

        $path_array = $explode;
        if (count($explode) == 2 ) {
        	if ($path_array[2] == 'index.php') {
        		return "Home | ";
        	} else {
        		$string = $path_array[2];
        		$str_replace = str_replace('.php', '', $string);
        		$path = ucfirst($str_replace);

        		if (strpos($path, '_') !== false) {
        			$string = explode('_',$path);
        			$path = '';
        			for ($i = 0; $i <count($string) ; $i++) {
        				if ($i == count($string) - 1) {
        					$path .= ucfirst($string[$i])." ";
        				} else {
        					$path .= ucfirst($string[$i])." ";
        				}
        			}
        			return $path." | ";
        		}else{
        			return ucfirst($str_replace)." | ";
        		}
        	}
        }elseif(count($explode)  == 3){
        	if ($path_array[3] == 'index.php') {
        		return "Admin Dashboard";
        	} else {
        		$string = $path_array[3];
        		$str_replace = str_replace('.php', '', $string);
        		$path = ucfirst($str_replace);

        		if (strpos($path, '_') !== false) {
        			$string = explode('_',$path);
        			$path = '';
        			for ($i = 0; $i <count($string) ; $i++) {
        				if ($i == count($string) - 1) {
        					$path .= ucfirst($string[$i])." ";
        				} else {
        					$path .= ucfirst($string[$i])." - ";
        				}
        			}
        			return $path." | ";
        		}else{
        			return ucfirst($str_replace)." | ".$user;
        		}
        	}
        }
    }

   	/*
    !-------------------------------------
    ! String Formatting
    ! Remove &lt; and &gt;
    !-------------------------------------
    */
    function stringFormat($value) 
    {
        $value = str_replace("&lt;", "<", $value);
        $value = str_replace("&gt;", ">", $value);
        $value = htmlspecialchars_decode($value);
        return $value;
    }


    /*
    !-------------------------------------
    ! Random String
    ! @return string
    !-------------------------------------
    */
    function randomString($value=10) 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $value; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }


    /*
    --------------------
	! current directory path
	! return string
	--------------------------
	*/
	public function currentPath()
	{
		
		$path_array = $_SERVER['PHP_SELF'];
		//return $path_array;
		$explode = explode('/', $path_array);
		unset($explode[0]);
		//echo "<pre>";
		//print_r(explode('/', $path_array));
		//echo "</pre>";
		$path = []; 

		for ($i = 1; $i <count($explode)  ; $i++) {
			//echo $explode[$i]."<br>";
			if ($explode[$i] == $explode['1']) {
				$arr[] = "index.php";
			} else {
				$arr[] = $explode[$i];

			}
			$path =  $arr;
		}

		return $path;

	}


}
 ?>