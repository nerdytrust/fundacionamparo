<?php
// doc eloquent 
// http://laraveles.com/docs/4.1/eloquent
//
class BaseModel extends \Eloquent {

	public function getEnumValues($column)
	{

      $table = $this->getTable();
	  $type = DB::select( DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$column'") )[0]->Type;
	  preg_match('/^enum\((.*)\)$/', $type, $matches);
	  $enum = array();
	  
	  $enums = array();

	  if(isset($matches[1]))
	  {
		  foreach( explode(',', $matches[1]) as $value )
		  {

		    $v = trim( $value, "'" );
		    $enum = array_add($enum, $v, $v);
		  }

		  //fixed
		  	
			foreach ($enum as $value) {

				if(!is_array($value))
					$enums[] = $value;
			}
	  }


	  return $enums;
	}

//
// http://laraveles.com/docs/4.1/eloquent#accessors-and-mutators
//	
	public function setPasswordAttribute($value)
	{
		$this->attributes["password"] = \Hash::make($value);
	}


	
}