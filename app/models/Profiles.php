<?php

class Profiles extends Eloquent {


    protected $primaryKey = 'id_profiles'; // !important

    protected $table = 'profiles';

    protected $fillable = array( 'provider', 'id_registrados' );

    public function user() {
        return $this->belongsTo( 'Registrados', 'id_registrados', 'id_registrados' );
    }
}