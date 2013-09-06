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
interface ValidatorInterface
{

    public function getHaltOnPass();

    public function getHaltOnFail();

    public function getSkipOnPass();

    public function getSkipOnFail();

    /**
     *
     * @param  mixed $value
     * @return Result
     * @throws Exception\RuntimeException If validation of $value is impossible
     */
    public function isValid($value);
}
