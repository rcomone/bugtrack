<?php

interface IWriter {
	public function write($message);
}

abstract class Ip_Logger implements IWriter {
    protected $formatter;
    protected function __construct($formatter) {
        if($formatter instanceof IFormatter)
        {
            $this->formatter = $formatter;
        }
        else
        {
            trigger_error('Invalid Formatter!', E_USER_ERROR);
        }
    }
}

class Ip_Logger_File extends Ip_Logger {
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

class Ip_Logger_DB extends Ip_Logger {
	// Dans notre exemple, $db est un objet de connexion de base de données ADOdb Lite.
    private $db = null;
    public function __construct($formatter, $db) {
        parent::__construct($formatter);
        $this->db = $db;
    }
    public function write($message) {
        $formatted_message = $this->formatter->format($message);
        $_date = time();
        $_escaped_message = $db->qstr($message);
        $this->db->Execute('INSERT INTO app_log_messages (time, message) VALUES (' . $_date . ',' . $_escaped_message . ')');
    }
}
