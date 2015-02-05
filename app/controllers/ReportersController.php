<?php

class ReportersController extends \BaseController {

	/**
	 * Display a listing of reporters
	 *
	 * @return Response
	 */
	public function index()
	{
		$reporters = Reporter::all();

		return View::make('reporters.index', compact('reporters'));
	}

	/**
	 * Show the form for creating a new reporter
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reporters.create');
	}

	/**
	 * Store a newly created reporter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Reporter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Reporter::create($data);

		return Redirect::route('reporters.index');
	}

	/**
	 * Display the specified reporter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$reporter = Reporter::findOrFail($id);

		return View::make('reporters.show', compact('reporter'));
	}

	/**
	 * Show the form for editing the specified reporter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$reporter = Reporter::find($id);

		return View::make('reporters.edit', compact('reporter'));
	}

	/**
	 * Update the specified reporter in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$reporter = Reporter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Reporter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$reporter->update($data);

		return Redirect::route('reporters.index');
	}

	/**
	 * Remove the specified reporter from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Reporter::destroy($id);

		return Redirect::route('reporters.index');
	}

}
