<?php
class JSONResponse extends Response
{
    private $message;
    private $statusCode;


    protected function headers()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
    }

    public function getData()
    {

        if (is_null($this->message)) {
            if (count($this->data) == 0) {
                $this->message = "No Content";
                $this->statusCode = "204";
            } else {
                $this->message = "Ok";
                $this->statusCode = "200";
            }
        }

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

        // $response['message'] = $this->message;
        // $response['count'] = count($this->data);
        // $response['results'] = $this->data;
        // if (sizeof($this->data) > 0){
        //     $response['message'] = "Search completed";
        // }else{
        //     $response['message'] = "No content";
        // }
        return json_encode($response);
    }

    public function setMessage($msg)
    {
        $this->message = $msg;
    }

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
    }
}
