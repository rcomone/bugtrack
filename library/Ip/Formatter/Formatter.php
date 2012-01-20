<?php

interface IFormatter {
	public function format($message);
}

class Ip_Formatter_String implements IFormatter {
    public function format($message) {
        return $message.PHP_EOL;
    }
}

class Ip_Formatter_XML implements IFormatter {
    public function format($message) {
        $timestamp = time();
        // Syntaxe heredoc
        $xml = <<<XML_EOL
            <message>
                <time>$timestamp</time>
                <text>$message</text>
            </message>
XML_EOL;
        return $xml.PHP_EOL;
    }
}

class Ip_Formatter_HTML implements IFormatter {
    public function format($message) {
        $timestamp = time();
        // Syntaxe heredoc
        $html = <<<HTML_EOL
            <p>
            <b>Timestamp:</b> $timestamp
            <br />
            <b>Message:</b> $message
            </p>
HTML_EOL;
        return $html.PHP_EOL;
    }
}

?>