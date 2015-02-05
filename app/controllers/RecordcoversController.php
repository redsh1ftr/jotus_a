<?php

class RecordcoversController extends \BaseController {

	/**
	 * Display a listing of recordcovers
	 *
	 * @return Response
	 */
	public function index()
	{
		$recordcovers = Recordcover::all();

		return View::make('recordcovers.index', compact('recordcovers'));
	}

	/**
	 * Show the form for creating a new recordcover
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('recordcovers.create');
	}

	/**
	 * Store a newly created recordcover in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Recordcover::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Recordcover::create($data);

		return Redirect::route('recordcovers.index');
	}

	/**
	 * Display the specified recordcover.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recordcover = Recordcover::findOrFail($id);

		return View::make('recordcovers.show', compact('recordcover'));
	}

	/**
	 * Show the form for editing the specified recordcover.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$recordcover = Recordcover::find($id);

		return View::make('recordcovers.edit', compact('recordcover'));
	}

	/**
	 * Update the specified recordcover in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$recordcover = Recordcover::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Recordcover::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$recordcover->update($data);

		return Redirect::route('recordcovers.index');
	}

	/**
	 * Remove the specified recordcover from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Recordcover::destroy($id);

		return Redirect::route('recordcovers.index');
	}

}
