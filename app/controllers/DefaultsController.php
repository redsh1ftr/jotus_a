<?php

class DefaultsController extends \BaseController {

	/**
	 * Display a listing of defaults
	 *
	 * @return Response
	 */
	public function index()
	{
		$defaults = Default::all();

		return View::make('defaults.index', compact('defaults'));
	}

	/**
	 * Show the form for creating a new default
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('defaults.create');
	}

	/**
	 * Store a newly created default in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Default::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Default::create($data);

		return Redirect::route('defaults.index');
	}

	/**
	 * Display the specified default.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$default = Default::findOrFail($id);

		return View::make('defaults.show', compact('default'));
	}

	/**
	 * Show the form for editing the specified default.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$default = Default::find($id);

		return View::make('defaults.edit', compact('default'));
	}

	/**
	 * Update the specified default in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$default = Default::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Default::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$default->update($data);

		return Redirect::route('defaults.index');
	}

	/**
	 * Remove the specified default from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Default::destroy($id);

		return Redirect::route('defaults.index');
	}

}
