<?php


class RolesController extends \CrudController {

    public function __construct()
    {
        parent::__construct();
    }

    public function beforeShow(&$params)
    {
        $permission = new Permissions;
        $permission_role = new PermissionsRoles;

        
        $combo = $permission::where("id_parent_permissions", "=",0);
        $groups = $permission_role
                ->rightJoin('permissions', function($join) use ($params)
                {
                    $join->on('permissions_roles.id_permissions', '=', 'permissions.id_permissions')
                    
                    ->where("permissions_roles.id_roles","=",$params["key_value"]);

                })->where('permissions.id_parent_permissions', '!=', 0)
                ->orderBy('permissions.name', 'desc');
    

        $params["permission"] = new StdClass;
        $params["permission"]->combo= $combo;
        $params["permission"]->groups= $groups;
        //dd($groups);
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return parent::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store()
    {
        return parent::store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return parent::show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return parent::update($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }

}
