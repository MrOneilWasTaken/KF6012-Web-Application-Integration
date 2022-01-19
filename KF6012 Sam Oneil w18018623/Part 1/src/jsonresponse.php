<?php
/**
 * JSON response 
 * 
 * Sets the headers to be able to display in JSON format
 * and sets the format for how the data is displayed within the response  
 *  
 * @author Sam Oneil w18018623
 *  
 */
class JSONResponse extends Response
{
    private $message;
    private $statusCode;


    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    }

    // Function that checks which format to put the data in
    public function getData()
    {
        // If the message is empty and there is not content, set the appropriate message, otherwise OK
        if (is_null($this->message)) {
            if (count($this->data) == 0) {
                $this->message = "No Content";
                $this->statusCode = "204";
            } else {
                $this->message = "Ok";
                $this->statusCode = "200";
            }
        }

        // If the status code is "200", put the data into an array and send 
        // back the response after it has been JSON encoded
        if ($this->statusCode == "200") {
            $response = array(
                "message" => $this->message,
                "status" => $this->statusCode,
                "count" => count($this->data),
                "timestamp" => date("T-m-d-H:i:s"),
                "results" => $this->data
            );
        } else {
            $response = array(
                "message" => $this->message,
                "status" => $this->statusCode,
                "timestamp" => date("T-m-d-H:i:s"),
                "results" => $this->data
            );
        }
        return json_encode($response);
    }

    // Sets the message
    public function setMessage($msg)
    {
        $this->message = $msg;
    }

    // Sets the status code
    public function setStatusCode($code)
    {
        $this->statusCode = $code;
    }
}
