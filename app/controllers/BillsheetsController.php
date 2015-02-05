<?php

class BillsheetsController extends \BaseController {

	/**
	 * Display a listing of billsheets
	 *
	 * @return Response
	 */
	public function index()
	{
		$billsheets = Billsheet::all();

		return View::make('billsheets.index', compact('billsheets'));
	}

	/**
	 * Show the form for creating a new billsheet
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('billsheets.create');
	}

	/**
	 * Store a newly created billsheet in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Billsheet::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Billsheet::create($data);

		return Redirect::route('billsheets.index');
	}

	/**
	 * Display the specified billsheet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$billsheet = Billsheet::findOrFail($id);

		return View::make('billsheets.show', compact('billsheet'));
	}

	/**
	 * Show the form for editing the specified billsheet.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$billsheet = Billsheet::find($id);

		return View::make('billsheets.edit', compact('billsheet'));
	}

	/**
	 * Update the specified billsheet in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$billsheet = Billsheet::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Billsheet::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$billsheet->update($data);

		return Redirect::route('billsheets.index');
	}

	/**
	 * Remove the specified billsheet from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Billsheet::destroy($id);

		return Redirect::route('billsheets.index');
	}

}
