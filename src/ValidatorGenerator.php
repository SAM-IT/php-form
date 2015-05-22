<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 5/22/15
 * Time: 12:42 PM
 */

namespace SamIT\Form;

/**
 * Class ValidatorGenerator
 * @package SamIT\Form
 */
class ValidatorGenerator {

    public static function createFromYii1Validator(\CValidator $validator, \CModel $model, $attribute) {
        $result = "var messages = [];";
        $result .= $validator->clientValidateAttribute($model, $attribute);
        $result .= "return (messages.length == 0) ? true : messages;";
        return $result;
    }

    public static function createFromYii1Model(\CModel $model, $attribute)
    {
        $result = [];
        foreach ($model->getValidators($attribute) as $validator) {
            $result[] = static::createFromYii1Validator($validator, $model, $attribute);
        }
        return $result;

    }
}