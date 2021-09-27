<?php

class Product
{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $type;
    public $size;
    public $height;
    public $width;
    public $length;
    public $weight;

    public function __construct($id, $sku, $name, $price, $type, $size, $height, $width, $length, $weight)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }

    static function fromDataArray(?array $data): ?Product
    {
        if (!$data) return null;
        return new Product($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9]);
    }
}
