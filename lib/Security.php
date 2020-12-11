<?php

	class Security {

		private static $seed="idfhdfhfsdbfsdhfSDFGJSFIGQFI86453456486";	
		
		public static function hacher($texte_en_clair) {
			$textebis= self::$seed . $texte_en_clair;
			$texte_hache = hash('sha256', $textebis);
			return $texte_hache;
		}

		public static function generateRandomHex() {
		  // Generate a 32 digits hexadecimal number
		  $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
		  $bytes = openssl_random_pseudo_bytes($numbytes); 
		  $hex   = bin2hex($bytes);
		  return $hex;
	}
	
	
	}

?>