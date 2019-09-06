<?php

namespace App\Users\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

final class Users extends \Phalcon\Mvc\Model {

    /**
     *
     * @var string
     */
    private $id;

    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var string
     */
    private $password;

    /**
     *
     * @var string
     */
    private $email;

    /**
     *
     * @var string
     */
    private $last_time_login;

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
        $this->setSource("users");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function id() {
        return $this->id;
    }

    public function name() {
        return $this->name;
    }

    public function password() {
        return $this->password;
    }

    public function email() {
        return $this->email;
    }

    public function lastTimeLogin() {
        return $this->last_time_login;
    }

    public function enabled() {
        return $this->enabled;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setLastTimeLogin($last_time_login) {
        $this->last_time_login = $last_time_login;
    }

    public function setEnabled($enabled) {
        $this->enabled = $enabled;
    }

}
