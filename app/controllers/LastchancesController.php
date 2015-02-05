<?php

class LastchancesController extends \BaseController {

	/**
	 * Display a listing of lastchances
	 *
	 * @return Response
	 */
	public function index()
	{
		$lastchances = Lastchance::all();

		return View::make('lastchances.index', compact('lastchances'));
	}

	/**
	 * Show the form for creating a new lastchance
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('lastchances.create');
	}

	/**
	 * Store a newly created lastchance in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Lastchance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Lastchance::create($data);

		return Redirect::route('lastchances.index');
	}

	/**
	 * Display the specified lastchance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lastchance = Lastchance::findOrFail($id);

		return View::make('lastchances.show', compact('lastchance'));
	}

	/**
	 * Show the form for editing the specified lastchance.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lastchance = Lastchance::find($id);

		return View::make('lastchances.edit', compact('lastchance'));
	}

	/**
	 * Update the specified lastchance in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$lastchance = Lastchance::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Lastchance::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$lastchance->update($data);

		return Redirect::route('lastchances.index');
	}

	/**
	 * Remove the specified lastchance from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Lastchance::destroy($id);

		return Redirect::route('lastchances.index');
	}

}
