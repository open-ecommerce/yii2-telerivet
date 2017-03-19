<?php

namespace openecommerce\yiitelerivet;

use yii\base\Component;

/**
 * YiiTelerivet class
 * @author Eduardo Silva <eduardo@open-ecommerce.org>
 * @license MIT
 * @version 1.0
 * @copyright (C) 2017 open-ecommerce.org <eduardo@open-ecommerce.org>
 * @see http://github.com/open-ecommerce
 * */

class YiiTelerivet extends Component
{

    /**
     * The internal Telerivet object.
     *
     * @var object Telerivet
     */
    private $telerivetClass;


    /**
	 ** @var string $auth_key -> Telerivet Authorization Key
     */

    public $auth_key;

    /**
     * init() called by yii.
     */

    public function init()
    {
          try {
                $this->telerivetClass = new \telerivet\telerivet-php-client\Telerivet_API($this->auth_key);
          } catch (Exception $e) {
                throw $e;
          }
    }

    public function initTelerivet() {
        return $this->telerivetClass;
    }

    /**
     * Use magic PHP function __call to route function calls to the Telerivet class.
     * Look into the Telerivet class for possible functions.
     *
     * @param string $methodName Method name from Telerivet class
     * @param array $methodParams Parameters pass to method
     * @return mixed
     */

    public function __call($methodName, $methodParams)
    {
        if (method_exists($this->telerivetClass, $methodName)) {
            return call_user_func_array(array($this->telerivetClass, $methodName), $methodParams);
        } else {
            return parent::__call($methodName, $methodParams);
        }
    }

}
