<?php 
namespace App;
use Exception;

ini_set('max_execution_time', 0);
ini_set('memory_limit','1288M');
set_time_limit(0);
/**
 * 
 */
class EmailChecker
{
	public $hellodomain = 'laravelcode.com';
	public $mailfrom = "nyiyl345@gmail.com";
	public $ip;
	public $mx;
	public $rcptto;

	
	function __construct()
	{
		$this->ip = '0.0.0.0';
	}

	public function checkmail($email = null)
	{
		$this->rcptto = $email;
		$array = explode("@", $this->rcptto);
		$dom = $array[1];

		if(getmxrr($dom , $mx)){

			if($mx){
				$this->mx = $mx[rand(0,count($mx)-1)];
			}

			return $this->processrange($this->ip);
		}
		// dd($this->mx);
		return false;

	}

	private function asynRead($sock)
	{

		$read_sock = array($sock);
		$write_sock = NULL;
		$except_sock = NULL;
		
		try {
			if(socket_select($read_sock, $write_sock, $except_sock,5) != 1){
				return false;
			}
			$ret = socket_read($sock, 512);
			// dd($ret);
			return $ret;
			
		} catch (Exception $e) {
			return false;
		}

	}


	private function smtpconnect($mta,$src_ip)
	{

		$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		// dd($sock);
		
		if($sock == FALSE){
			
			return array(false,'Unable to open socket');
		}
		try {
			if(!socket_bind($sock, $src_ip)){
				return array(false,"Unable to bind src ip");
			}
			
		} catch (Exception $e) {
			return array('Exception'=>'Some error produce please try again');	
		}
		$timeout = array('sec' => 1000 , 'usec'=>0);

		socket_set_option($sock, SOL_SOCKET, SO_RCVTIMEO, $timeout);

		socket_set_nonblock($sock);

		@socket_connect($sock, $mta , 25);
		$ret = $this->asynRead($sock);
		
		// dd($ret);
		if($ret === false){
			return array(false , 'initial read time out');
		}
		if(!preg_match('/^220/',$ret)){
			return array(false,$ret);
		}

		// hello domain
		socket_write($sock,"EHLO ".$this->hellodomain."\r\n");

		$ret = $this->asynRead($sock);


		if($sock === false){
			return array(false,'ehlo time out');
		}

		if(!preg_match('/^250/',$ret)){
			return array(false,$ret);
		}

		// mail from
		socket_write($sock,"MAIL FROM:<".$this->mailfrom.">\r\n");

		$ret = $this->asynRead($sock);


		if($sock === false){
			return array(false,'from time out');
		}

		if(!preg_match('/^250/',$ret)){
			return array(false,$ret);
		}

		// mail to
		socket_write($sock, "RCPT TO:<".$this->rcptto.">\r\n");


		$ret = $this->asynRead($sock);
		if($sock === false){
			return array(false,'from time out');
		}
		// bad response
		if(!preg_match('/^250/',$ret)){
			return array(false,$ret);
		}
		// good

		socket_close($sock);
		return array(true,$ret);

	}


	private function processrange($ip)
	{
		
			list($ret,$msg) = $this->smtpconnect($this->mx,$ip);
			$msg = trim($msg);
			// dd($msg);
			return $ret;

		
	}


}