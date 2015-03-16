<?php

class DashBoardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dashboard
	 *
	 * @return Response
	 */
	public function index()
	{

		
		// $admin = new Role;
		// $admin->name = 'sss21s';
		// $admin->save();
		// $user = User::find(1)->first();
		// /* role attach alias */
		// $user->id_roles =  $admin->id_roles; // Parameter can be an Role object, array or id.
		// $user->save();
		// // /* OR the eloquent's original: */
		// // $user->roles()->sync( array($admin->id_roles) ); // id only
		// $managePosts = new Permission;
		// $managePosts->name = 'swefds';
		// $managePosts->display_name = 'Manage Posts';
		// $managePosts->save();
		// $admin->perms()->sync(array($managePosts->id_permissions));
		
		$tables = DB::select('SHOW TABLES');
		$return = [];
		foreach ($tables as $table) {
			if($table->Tables_in_jsl != "migrations")
				$return[] = str_singular($table->Tables_in_jsl);
		}
        return View::make("dashboard.dashboard")
            ->with('tables',$return);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /dashboard/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dashboard
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dashboard/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /dashboard/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}