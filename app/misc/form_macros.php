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


//
// HTML
//

Form::macro('editor', function($name, $default = NULL, $attrs = array())
{
    //<textarea class="summernote"><p>Seasons <b>coming up</b></p></textarea>

    $item= '<textarea sumernote name="'. $name .'" ';

    // If Id not explicitly set, use name (Id is needed to associate with labels)
    if (! isset($attrs['id'])) $item .= 'id="' . $name .'" ';

    if (is_array($attrs))
    {
        foreach ($attrs as $a => $v)
        {
            $item .= ($a !== 0 ? $a . '="' : null) . $v .'" ';
        }
    }

    if($default)
        $item .= $default;

    $item .= "</textarea>";

    return $item;
});



Form::macro('html', function($name, $default = NULL, $attrs = array())
{
     return Form::editor($name, $default, $attrs);
});


Form::macro('datepicker', function($name, $default = NULL, $attrs = array(),$type=null)
{
    $item = '<div class="input-group">';

        $item .= '<input type="text" name="'. $name .'" ';

        if($default)
            $item .= 'value="'. $default .'" ';

        if($type)
            $item.=$type.'="'.$type.'"  ';

        // If Id not explicitly set, use name (Id is needed to associate with labels)
        if (! isset($attrs['id'])) $item .= 'id="' . $name .'" ';

        if (is_array($attrs))
        {
            foreach ($attrs as $a => $v)
            {
                $item .= ($a !== 0 ? $a . '="' : null) . $v .'" ';
            }
        }
    $item .= '>';

    $item .='<span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>';
    $item .='</div>';

    return $item;

});


Form::macro('dateline', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('datepicker', $name, $default, $attrs,"dateline");
});

Form::macro('datetime', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('datepicker', $name, $default, $attrs,"datetime");
});

Form::macro('date', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('datepicker', $name, $default, $attrs,"date");
});

Form::macro('time', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('datepicker', $name, $default, $attrs,"time");
});



Form::macro('filepicker', function($name, $default = NULL, $attrs = array())
{


    $item = '<div class="fileinput fileinput-new input-group" data-provides="fileinput">';
    $item.= '<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>';
    $item.= '<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">'.trans('crud.select_file') .'</span><span class="fileinput-exists">'.trans('crud.change').'</span>';


    $item = '<input type="hidden" name="'. $name .'" ';
        if($default)
            $item .= 'value="'. $default .'" ';
    $item .= '>';

        $item .= '<input type="file" name="'. $name .'" ';

        // If Id not explicitly set, use name (Id is needed to associate with labels)
        if (! isset($attrs['id'])) $item .= 'id="' . $name .'" ';

        if (is_array($attrs))
        {
            foreach ($attrs as $a => $v)
            {
                $item .= ($a !== 0 ? $a . '="' : null) . $v .'" ';
            }
        }
    $item .= '>';

    $item .='</span>';
    $item .='<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">'.trans('crud.remove').'</a>';
    $item .='</div>';

    return $item;

});

Form::macro('audio', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});

Form::macro('image', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});

Form::macro('video', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});

Form::macro('document', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});
Form::macro('zip', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});

Form::macro('file', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('filepicker', $name, $default, $attrs);
});



Form::macro('currency', function($name, $default = null, $attrs = array())
{

    $attrs_default = ["class"=>"form-control currency","min"=>0,"step"=>"0.01","data-number-to-fixed"=>"2","data-number-stepfactor"=>"100"];

    $attrs = array_merge($attrs_default,$attrs);

    $item = '<div class="input-group">';

        $item .='<span class="input-group-addon">$</span>';
        $item .= '<input type="text" name="'. $name .'" ';

        if($default)
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
    $item .= '>';

    
    $item .='</div>';

    return $item;

});

Form::macro('money', function($name, $default = NULL, $attrs = array())
{
    return Form::macro('currency', $name, $default, $attrs);
});

Form::macro('number', function($name, $default = NULL, $attrs = array())
{
 
    $attrs_default = ["class"=>"form-control currency","min"=>0,"step"=>"1","data-number-to-fixed"=>"2","data-number-stepfactor"=>"100"];

    $attrs = array_merge($attrs_default,$attrs);


        $item .= '<input type="number" name="'. $name .'" ';

        if($default)
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
    $item .= '>';


    return $item;
});



Form::macro('combo', function($name, $default = NULL, $attrs = [], $data = [])
{
    $attrs_default = ["combo"=>"combo"];

    $attrs = array_merge($attrs_default,$attrs);

    return Form::select($name, [$data],$default,$attrs);
});
