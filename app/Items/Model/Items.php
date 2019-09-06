<?php

namespace App\Items\Model;

final class Items extends \Phalcon\Mvc\Model {

    /**
     *
     * @var string
     */
    private $id;

    /**
     *
     * @var string
     */
    private $item;

    /**
     *
     * @var string
     */
    private $description;

    /**
     *
     * @var string
     */
    private $sku;

    /**
     *
     * @var integer
     */
    private $quantity;

    /**
     *
     * @var double
     */
    private $price;

    /**
     *
     * @var string
     */
    private $enabled;

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("public");
        $this->setSource("items");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items[]|Items|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function id() {
        return $this->id;
    }

    public function item() {
        return $this->item;
    }

    public function description() {
        return $this->description;
    }

    public function sku() {
        return $this->sku;
    }

    public function quantity() {
        return $this->quantity;
    }

    public function price() {
        return $this->price;
    }

    public function enabled() {
        return $this->enabled;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setItem($item) {
        $this->item = $item;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setEnabled($enabled) {
        $this->enabled = $enabled;
    }

}
