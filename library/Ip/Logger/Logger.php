<?php
interface IWriter {
	public function write($message);
}

abstract class Library_Ip_Formatter_Logger_Logger implements IWriter {
	
	protected $formatter;
	protected function __construct(IFormatter $formatter) {
	if($formatter instanceof IFormatter){
		$this->formatter = $formatter;
	}else{
	trigger_error('Invalid Formatter!', E_USER_ERROR);
	}
	}
}

class Library_Ip_Formatter_Logger_Logger_File extends Library_Ip_Formatter_Logger_Logger {
	private $file = null;
	public function __construct($formatter, $file) {
	parent::__construct($formatter);
	$this->file = $file;
	}
	public function write($message) {
	$formatted_message = $this->formatter->format($message);
	file_put_contents($this->file, $formatted_message, FILE_APPEND);
	}
}