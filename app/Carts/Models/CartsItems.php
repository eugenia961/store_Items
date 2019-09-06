<?php

namespace App\Carts\Models;

class CartsItems extends \Phalcon\Mvc\Model {

    /**
     *
     * @var string
     */
    private $cart_id;

    /**
     *
     * @var string
     */
    private $item_id;

    /**
     *
     * @var integer
     */
    private $quantity;

    /**
     *
     * @var double
     */
    private $unit_price;

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("public");
        $this->setSource("carts_items");
        $this->belongsTo('cart_id', 'Carts', 'id', ['alias' => 'Carts']);
        $this->belongsTo('item_id', 'Items', 'id', ['alias' => 'Items']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'carts_items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CartsItems[]|CartsItems|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CartsItems|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function cartId() {
        return $this->cart_id;
    }

    public function itemId() {
        return $this->item_id;
    }

    public function quantity() {
        return $this->quantity;
    }

    public function unitPrice() {
        return $this->unit_price;
    }

    public function setCartId($cart_id) {
        $this->cart_id = $cart_id;
    }

    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setUnitPrice($unit_price) {
        $this->unit_price = $unit_price;
    }

}
