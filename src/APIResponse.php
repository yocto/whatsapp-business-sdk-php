<?php
namespace WHATSAPP\SDK;

class APIResponse{

    private $statusCode;
    private $body;

    function __construct(int $statusCode,string $body){
        $this->statusCode = $statusCode;
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int{
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getBody(): string{
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getBodyAsJSON(): string{
        return json_decode($this->body,true);
    }

    /**
     * @return bool
     */
    public function hasMeta(){
        return isset($this->getBodyAsJSON()['meta']);
    }

    /**
     * @return bool
     */
    public function hasErrors(){
        return isset($this->getBodyAsJSON()['errors']);
    }

    /**
     * @return array
     */
    public function getMeta(){
        return $this->getBodyAsJSON()['meta'] ?? [];
    }

    /**
     * @return string|null
     */
    public function getMetaVersion(){
        return $this->getMeta()['version'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getMetaAPIStatus(){
        return $this->getMeta()['api_status'] ?? null;
    }

    /**
     * @return APIError[]
     */
    public function getErrors(){
        $errors = [];
        foreach(($this->getBodyAsJSON()['errors'] ?? []) AS $error){
            $errors[] = new APIError($error['code'] ?? 0,$error['title'] ?? null,$error['details'] ?? null);
        }
        return $errors;
    }

}