<?php
	class terbilang
	{
		var $CI	= null;
		function __construct()
		{
			$this->CI =& get_instance();
			
		}
		    /* bisa juga dibuat file library baru */
	    function _proses($angka)
	    {	
	        /* buat array angka terbilang */
	        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	        if (doubleVal($angka) < 12)
	            return " " . $huruf[doubleVal($angka)];
	        elseif (doubleVal($angka) < 20)
	            return $this->_proses(doubleVal($angka) - 10) . "belas";
	        elseif (doubleVal($angka) < 100)
	            return $this->_proses(doubleVal($angka) / 10) . " puluh" . $this->_proses(doubleVal($angka) % 10);
	        elseif (doubleVal($angka) < 200)
	            return " seratus" . $this->_proses(doubleVal($angka) - 100);
	        elseif (doubleVal($angka) < 1000)
	            return $this->_proses(doubleVal($angka) / 100) . " ratus" . $this->_proses(doubleVal($angka) % 100);
	        elseif (doubleVal($angka) < 2000)
	            return " seribu" . $this->_proses(doubleVal($angka) - 1000);
	        elseif (doubleVal($angka) < 1000000)
	            return $this->_proses(doubleVal($angka) / 1000) . " ribu" . $this->_proses(doubleVal($angka) % 1000);
	        elseif (doubleVal($angka) < 1000000000)
	            return $this->_proses(doubleVal($angka) / 1000000) . " juta" . $this->_proses(doubleVal($angka) % 1000000);
	        elseif (doubleVal($angka) < 1000000000000)
	            return $this->_proses(doubleVal($angka) / 1000000000) . " milyar" . $this->_proses(doubleVal($angka) % 1000000000);
	    }
	function getOS($userAgent) {
  // Create list of operating systems with operating system name as array key 
		$oses = array (
		'iPhone' => '(iPhone)',
		'Windows 3.11' => 'Win16',
		'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)', // Use regular expressions as value to identify operating system
		'Windows 98' => '(Windows 98)|(Win98)',
		'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
		'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
		'Windows 2003' => '(Windows NT 5.2)',
		'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
		'Windows 7' => '(Windows NT 6.1)|(Windows NT 6.2)|(Windows 7)',
		'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)|(Windows NT)',
		'Windows ME' => 'Windows ME',
		'Open BSD'=>'OpenBSD',
		'Sun OS'=>'SunOS',
		'Linux'=>'(Linux)|(X11)',
		'Safari' => '(Safari)',
		'Macintosh'=>'(Mac_PowerPC)|(Macintosh)',
		'QNX'=>'QNX',
		'BeOS'=>'BeOS',
		'OS/2'=>'OS/2',
		'Search Bot'=>'(nuhk)|(Googlebot)|(Yammybot)|(Openbot)|(Slurp/cat)|(msnbot)|(ia_archiver)'
	);

		foreach($oses as $os=>$pattern){ // Loop through $oses array
	    // Use regular expressions to check operating system type
			//echo $pattern;
			if(preg_match("/$pattern/", $userAgent)) { // Check if a value in $oses array matches current user agent.
				return $os; // Operating system was matched so return $oses key
			}
		}
	return 'Unknown'; // Cannot find operating system so return Unknown
	}

	}		
?>