<?php
abstract class Webpage
{
    private $head;
    private $foot;
    private $body;

    public function __construct($title, $heading)
    {
        $this->setHead($title);
        $this->addHeading1($heading);
        $this->setFoot();
    }

    protected function setHead($title)
    {
        $css = BASEPATH . "assets/style.css";
        $this->head = <<<EOT
<!DOCTYPE html>
<html lang="en-gb">
<head>
    <title>$title</title>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=$css>
</head>
<body>
EOT;
    }

    private function getHead()
    {
        return $this->head;
    }

    protected function setBody($text)
    {
        $this->body .= $text;
    }

    private function getBody()
    {
        return $this->body;
    }

    protected function setFoot()
    {
        $this->foot = <<<EOT
</body>
</html>
EOT;
    }

    private function getFoot()
    {
        return $this->foot;
    }

    protected function addHeading1($text)
    {
        $this->setBody("<h1>$text</h1>");
    }

    public function addParagraph($text)
    {
        $this->setBody("<p>$text</p>");
    }

    public function generateWebpage()
    {
        return $this->head . $this->body . $this->foot;
    }
}
