<?php
namespace WHATSAPP\SDK;

class APIError{

    private $code;
    private $title;
    private $details;

    function __construct(int $code,string $title,string $details){
        $this->code = $code;
        $this->title = $title;
        $this->details = $details;
    }

    /**
     * @return int
     */
    public function getCode(): int{
        return $this->code;
    }

    /**
     * @return string
     */
    public function getTitle(): string{
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDetails(): string{
        return $this->details;
    }

}