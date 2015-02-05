<?php

class PagecountersController extends \BaseController {

	/**
	 * Display a listing of pagecounters
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagecounters = Pagecounter::all();

		return View::make('pagecounters.index', compact('pagecounters'));
	}

	/**
	 * Show the form for creating a new pagecounter
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pagecounters.create');
	}

	/**
	 * Store a newly created pagecounter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Pagecounter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Pagecounter::create($data);

		return Redirect::route('pagecounters.index');
	}

	/**
	 * Display the specified pagecounter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pagecounter = Pagecounter::findOrFail($id);

		return View::make('pagecounters.show', compact('pagecounter'));
	}

	/**
	 * Show the form for editing the specified pagecounter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pagecounter = Pagecounter::find($id);

		return View::make('pagecounters.edit', compact('pagecounter'));
	}

	/**
	 * Update the specified pagecounter in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pagecounter = Pagecounter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Pagecounter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$pagecounter->update($data);

		return Redirect::route('pagecounters.index');
	}

	/**
	 * Remove the specified pagecounter from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Pagecounter::destroy($id);

		return Redirect::route('pagecounters.index');
	}

}
