<?php 
/**
 * HTMLError controller
 * 
 * This class sets the headers of the response webpage so that it displays HTML correctly
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class HTMLResponse extends Response
    {
        protected function headers(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: text/html; charset=UTF-8");
        }
    }
?>