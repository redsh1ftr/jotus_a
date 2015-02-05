<?php

class CommandersController extends \BaseController {

	/**
	 * Display a listing of commanders
	 *
	 * @return Response
	 */
	public function index()
	{
		$commanders = Commander::all();

		return View::make('commanders.index', compact('commanders'));
	}

	/**
	 * Show the form for creating a new commander
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('commanders.create');
	}

	/**
	 * Store a newly created commander in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Commander::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Commander::create($data);

		return Redirect::route('commanders.index');
	}

	/**
	 * Display the specified commander.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$commander = Commander::findOrFail($id);

		return View::make('commanders.show', compact('commander'));
	}

	/**
	 * Show the form for editing the specified commander.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$commander = Commander::find($id);

		return View::make('commanders.edit', compact('commander'));
	}

	/**
	 * Update the specified commander in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$commander = Commander::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Commander::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$commander->update($data);

		return Redirect::route('commanders.index');
	}

	/**
	 * Remove the specified commander from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Commander::destroy($id);

		return Redirect::route('commanders.index');
	}

}
