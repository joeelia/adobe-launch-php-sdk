<?php

    namespace AdobeLaunch;
    
    use \GuzzleHttp\Client as Guzzle;
    use AdobeLaunch\AdobeLaunch\Files;
    
    class AdobeLaunch {
        private static $token;
	private static $key;
        
        public function __construct($accesstoken,$apikey) {
		self::$token = $accesstoken;
		self::$key = $apikey;
            $this->files = new Files();
        }

        /*
        * Main function for handling post requests.
        */
        public static function postRequest($endpoint,$header,$body) {
			$client = new Guzzle();
        	$res = $client->request('POST', $endpoint, [
					'headers' => ['Content-type' => $header, 'X-Api-Key'=> self::$key],
    				'auth' => ['', self::$token],
    				'body' => $body
    				
					]);
					
			echo $res->getStatusCode();
			$body = $res->getBody();
			print_r(json_decode((string) $body));
			// "200"
			echo $res->getBody();
			// {"type":"User"...'
        }
                /*
        * Main function for handling multi-part post requests.
        */
        public static function postMultiRequest($endpoint,$multipart) {
			$client = new Guzzle();
        	$res = $client->request('POST', $endpoint, [
		'headers' => ['X-Api-Key' => self::$key],
        	'auth' => ['', self::$token],
   			'multipart' => $multipart
				]);
					
			echo $res->getStatusCode();
			$body = $res->getBody();
			print_r(json_decode((string) $body));
			// "200"
			echo $res->getBody();
			// {"type":"User"...'
        }
        
        
              /*
        * Main function for post form param
        */
        public static function postFormRequest($endpoint,$form_params) {
			$client = new Guzzle();
        	$res = $client->request('POST', $endpoint, [
		'headers' => ['X-Api-Key' => self::$key],
        	'auth' => ['', self::$token],
   			'form_params' => $form_params
				]);
					
			//echo $res->getStatusCode();
			$body = $res->getBody();
			return $body;
			//print_r(json_decode((string) $body));
			// "200"
			//echo $res->getBody();
			// {"type":"User"...'
        }
        
        
        public static function getRequest($endpoint) {
            $client = new Guzzle();
			$res = $client->request('GET', $endpoint, [
					'headers' => ['Content-type' => 'application/json', 'X-Api-Key' => self::$key],
    				'auth' => ['', self::$token]
					]);

			//echo $res->getStatusCode();
			// "200"
			//echo $res->getBody();
			$body = $res->getBody();
			return $body;
			// {"type":"User"...'
        }

        public static function deleteRequest($endpoint) {
            $client = new Guzzle();
			$res = $client->request('DELETE', $endpoint, [
					'headers' => ['Content-type' => 'application/json', 'X-Api-Key' => self::$key],
    				'auth' => ['', self::$token]
					]);

			echo $res->getStatusCode();
			// "200"
			echo $res->getBody();
			// {"type":"User"...'
        }
        
        /*
        * Updates the access
        */
        public function updateAccess($accesstoken,$apikey) {
		self::$token = $accesstoken;
		self::$key = $apikey;
        }
    }

?>
