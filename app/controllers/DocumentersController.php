<?php

class DocumentersController extends \BaseController {

	/**
	 * Display a listing of documenters
	 *
	 * @return Response
	 */
	public function index()
	{
		$documenters = Documenter::all();

		return View::make('documenters.index', compact('documenters'));
	}

	/**
	 * Show the form for creating a new documenter
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('documenters.create');
	}

	/**
	 * Store a newly created documenter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Documenter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Documenter::create($data);

		return Redirect::route('documenters.index');
	}

	/**
	 * Display the specified documenter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$documenter = Documenter::findOrFail($id);

		return View::make('documenters.show', compact('documenter'));
	}

	/**
	 * Show the form for editing the specified documenter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$documenter = Documenter::find($id);

		return View::make('documenters.edit', compact('documenter'));
	}

	/**
	 * Update the specified documenter in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$documenter = Documenter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Documenter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$documenter->update($data);

		return Redirect::route('documenters.index');
	}

	/**
	 * Remove the specified documenter from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Documenter::destroy($id);

		return Redirect::route('documenters.index');
	}

}
