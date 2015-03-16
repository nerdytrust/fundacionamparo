<?php

class MockAwb {

    public static $schema = array(
        "id"               => "digit|index|show",
        "email"            => "email|index|create|edit",
        "profile_picture"  => "file|create|edit",
        "address"          => "textarea|create|edit"
    );

    public static $resourceName   = "AwbController";
    public static $viewFolderName = "awb";
    public static $modelName      = "Awb";
    public static $route          = "awb/";
    public static $routeIndex     = "awb/";
    public static $validation     = true;

}

