<?php

class Book
{
    private $code_book;
    public $name;
    private $qty;

    /**
     * @param $code_book
     * @param $qty
     * @throws Exception
     */
    public function __construct($code_book, $name, $qty)
    {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }


    /**
     * @return mixed
     */
    public function getCodeBook(): mixed
    {
        return $this->code_book;
    }

    /**
     * @param mixed $code_book
     */
    private function setCodeBook($code_book): void
    {
        $pattern = "/^[A-Z]{2}\d{2}$/";
        if (preg_match($pattern, $code_book)) {
            $this->code_book = $code_book;
        } else {
            throw new Exception("Kode buku not valid");
        }
    }

    /**
     * @return mixed
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param mixed $qty
     * @throws Exception
     */
    private function setQty($qty): void
    {
        if ($qty < 0) {
            throw new Exception("Kuantitas tidak valid");
        }
        $this->qty = $qty;
    }
}