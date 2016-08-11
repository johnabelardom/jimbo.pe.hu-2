<?php
class Custompage extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function index()
{
    echo "<h1>Cool Vibes</h1>";
    echo "<p>If you can read this then everything is working.</p>";
    echo "<p>This file is being read from the custompage controller, which is in the 'modules' folder.  Ooh yeah!</p>";
}

function hello()
{
    echo "hello you"; //this message can be viewed by going to http://localhost/hmvctest/custompage/hello
}

}