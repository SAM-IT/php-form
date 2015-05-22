<?php
/**
 * Created by PhpStorm.
 * User: sam
 * Date: 5/22/15
 * Time: 12:25 PM
 */

namespace SamIT\Form;

/**
 * Helper class for forms that use samit-forms validation.
 * @package SamIT\Form
 */
class FormHelper {
    /**
     * Returns the javascript that is used to activate validation for all forms inside the $target selector.
     * @param string $target
     */
    public static function activateForm($target = 'body') {
        return "$('{$target}').stForm();";
    }

    public static function addAttributesForForm(array &$attributes, $invalidClass = 'st-invalid', $validClass = 'st-valid', $target = '.form-group')
    {
        $attributes['st-form'] = true;
        $attributes['st-invalid-class'] = $invalidClass;
        $attributes['st-valid-class'] = $validClass;
        $attributes['st-target'] = $target;
    }

    public static function createAttributesForForm($invalidClass = 'st-invalid', $validClass = 'st-valid', $target = '.form-group')
    {
        $attributes = [];
        static::addAttributesForForm($attributes, $invalidClass, $validClass, $target);
        return $attributes;
    }

    public static function addAttributesForInput(array &$attributes, array $validators)
    {
        $attributes['st-input'] = true;
        $attributes['st-validators'] = json_encode($validators);
    }

    public static function createAttributesForInput(array $validators = [])
    {
        $attributes = [];
        static::addAttributesForInput($attributes, $validators);
        return $attributes;
    }

    public static function addAttributesForHighlight(array &$attributes, $name) {
        $attributes['st-mark'] = $name;
    }

    public static function createAttributesForHighlight($name) {
        $result = [];
        static::addAttributesForHighlight($result, $name);
        return $result;
    }
}