<?php

class EventloggersController extends \BaseController {

	/**
	 * Display a listing of eventloggers
	 *
	 * @return Response
	 */
	public function index()
	{
		$eventloggers = Eventlogger::all();

		return View::make('eventloggers.index', compact('eventloggers'));
	}

	/**
	 * Show the form for creating a new eventlogger
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('eventloggers.create');
	}

	/**
	 * Store a newly created eventlogger in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Eventlogger::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Eventlogger::create($data);

		return Redirect::route('eventloggers.index');
	}

	/**
	 * Display the specified eventlogger.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$eventlogger = Eventlogger::findOrFail($id);

		return View::make('eventloggers.show', compact('eventlogger'));
	}

	/**
	 * Show the form for editing the specified eventlogger.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$eventlogger = Eventlogger::find($id);

		return View::make('eventloggers.edit', compact('eventlogger'));
	}

	/**
	 * Update the specified eventlogger in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$eventlogger = Eventlogger::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Eventlogger::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$eventlogger->update($data);

		return Redirect::route('eventloggers.index');
	}

	/**
	 * Remove the specified eventlogger from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Eventlogger::destroy($id);

		return Redirect::route('eventloggers.index');
	}

}
