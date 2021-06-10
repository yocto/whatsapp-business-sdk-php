<?php
namespace WHATSAPP\SDK;

class APIRequest{

    private $method;
    private $url;
    private $headers;
    private $body;

    public function __construct(string $method,string $url,array $headers=[],?string $body=null){
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getMethod(): string{
        return $this->method;
    }

    /**
     * @return string
     */
    public function getURL(): string{
        return $this->url;
    }

    /**
     * @return array
     */
    public function getHeaders(): array{
        return $this->headers;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string{
        return $this->body;
    }

}