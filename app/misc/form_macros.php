<?php


/**
* Date input - http://www.w3.org/TR/html-markup/input.date.html
*
* The input element with a type attribute whose value is "date" represents a control for setting the
* element’s value to a string representing a date.
*
* Value - A valid full-date as defined in [RFC 3339], with the additional qualification
*   that the year component is four or more digits representing a number greater than 0.
*/
//<input type="checkbox" checked data-toggle="toggle" data-on="Ready" data-off="Not Ready" data-onstyle="success" data-offstyle="danger"> 

Form::macro('toggle', function($name, $default = "false", $attrs = array(),$data=array())
{
	$item = '<input type="hidden" name="'. $name .'" ';
	$item .= 'value="'. $default .'" ';
	$item .= '>';

    $item .= '<input type="checkbox" data-toggle="toggle" name="'. $name .'" data-onstyle="success" data-offstyle="danger"';

    $item .= 'value="'. $default .'" ';

    // If Id not explicitly set, use name (Id is needed to associate with labels)
    if (! isset($attrs['id'])) $item .= 'id="' . $name .'" ';

    if (is_array($attrs))
    {
        foreach ($attrs as $a => $v)
        {
            $item .= ($a !== 0 ? $a . '="' : null) . $v .'" ';
        }
    }

    if (is_array($data) and count($data) > 0)
    {
    	list($on,$off) = array_keys($data);

    	$item .= 'data-on="'.$on.'" ';
    	$item .= 'data-off="'.$off.'" ';

    }

    $item .= ">";

    return $item;
});
