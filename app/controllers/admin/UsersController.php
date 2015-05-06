<?php
namespace admin;

/**
 * 
 */
class UsersController extends CrudController {

    public function beforeShow(&$params)
    {
        $permission = new Permissions;
        $permission_user = new PermissionsUsers;
        $permission_role = new PermissionsRoles;
        

        $combo = $permission::where("id_parent_permissions", "=",0);

        $user = $permission_user
                ->rightJoin('permissions', function($join) use ($params)
                {
                    $join->on('permissions_users.id_permissions', '=', 'permissions.id_permissions')
                    
                    ->where("permissions_users.id_users","=",$params["key_value"]);

                })->where('permissions.id_parent_permissions', '!=', 0)
                ->orderBy('permissions.name', 'desc');
    
        $role = $permission_role
                ->rightJoin('permissions', function($join) use ($params)
                {
                    $join->on('permissions_roles.id_permissions', '=', 'permissions.id_permissions')
                    
                    ->where("permissions_roles.id_roles","=",$params["record"]->id_roles);

                })->where('permissions.id_parent_permissions', '!=', 0)
                ->orderBy('permissions.name', 'desc');

        $params["permission"] = new StdClass;
        $params["permission"]->combo= $combo;

        $params["permission"]->role= $role->get()->toArray();
        $params["permission"]->user= $user->get()->toArray();
        //dd($groups);
        
    }

	/**
	 * [login description]
	 * @return [type]
	 */
	public function login()
	{
		if (\Auth::check())
		{
		    return \Redirect::to("dashboard");
		}
		return \View::make('admin.home.login');
	}

	/**
	 * [loginEmail description]
	 * @return [type]
	 */
	public function loginEmail()
	{
		$data = \Input::only(["email","password"]);
		$rules = [
			"password" => "required|min:5",
			"email" => "required|min:10|email"
		];


		$validation = \Validator::make($data,$rules);

		if($validation->passes())
		{
			$credentials = ["email" => $data["email"], "password" => $data["password"]];


			if(\Auth::admin()->attempt($credentials))
			{
				return \Redirect::intended(getenv('APP_ADMIN_PREFIX').'/dashboard')->with('success', 'You have logged in successfully');
				//return Redirect::back();
			}

			return \Redirect::back()->withInput()->with("error","Check the username and password and try again");
		}

		return \Redirect::back()->withInput()->withErrors($validation->messages());
	}


	/**
	 * [logout description]
	 * @return [type]
	 */
	public function logout()
	{
		\Auth::admin()->logout();
		return \View::make('admin.home.login');
	}



}