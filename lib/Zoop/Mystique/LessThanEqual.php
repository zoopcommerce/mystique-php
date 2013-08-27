<?php
/**
 * @link       http://zoopcommerce.github.io/mystique
 * @package    mystique
 * @license    MIT
 */
namespace Zoop\Mystique;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class LessThanEqual extends CompareBase
{

    public function isValid($value)
    {
        $result = new Result(["value" => true]);

        if (! ($value <= $this->compare )) {
            $result->setValue(false);
            $result->addMessage('lessThanEqual');
        }

        return $result;
    }
}
