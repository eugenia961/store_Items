<?php
namespace App\Carts\Models;

class Carts extends \Phalcon\Mvc\Model {

    /**
     *
     * @var string
     */
    private $id;

    /**
     *
     * @var string
     */
    private $user_id;

    /**
     *
     * @var string
     */
    private $creation;

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("public");
        $this->setSource("carts");
        $this->hasMany('id', 'CartsItems', 'cart_id', ['alias' => 'CartsItems']);
        $this->belongsTo('user_id', 'Users', 'id', ['alias' => 'Users']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'carts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Carts[]|Carts|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Carts|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function id() {
        return $this->id;
    }

    public function userId() {
        return $this->user_id;
    }

    public function creation() {
        return $this->creation;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setCreation($creation) {
        $this->creation = $creation;
    }

}
