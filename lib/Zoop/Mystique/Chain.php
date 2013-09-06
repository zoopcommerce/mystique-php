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
class Chain extends Base
{

    protected $validators = [];

    public function getValidators()
    {
        return $this->validators;
    }

    public function setValidators(array $validators)
    {
        $this->validators = $validators;
    }

    public function __construct(array $options = [])
    {
        if (isset($options['validators'])) {
            $this->setValidators($options['validators']);
        }
    }

    public function isValid($value)
    {
        $result = new Result(['value' => true]);

        foreach ($this->validators as $validator) {
            if (($result->getValue() && $validator->getSkipOnPass()) ||
                ! $result->getValue() && $validator->getSkipOnFail()
            ) {
                continue;
            }

            $validatorResult = $validator->isValid($value);
            if (! $validatorResult->getValue()) {

                $result->setValue(false);
                $result->addMessages($validatorResult->getMessages());

                if ($validator->getHaltOnFail()) {
                    return $result;
                }
            }
            if ($validator->getHaltOnPass()) {
                return $result;
            }
        }

        return $result;
    }
}
