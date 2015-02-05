<?php

class ListersController extends \BaseController {

	/**
	 * Display a listing of listers
	 *
	 * @return Response
	 */
	public function index()
	{
		$listers = Lister::all();

		return View::make('listers.index', compact('listers'));
	}

	/**
	 * Show the form for creating a new lister
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('listers.create');
	}

	/**
	 * Store a newly created lister in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Lister::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Lister::create($data);

		return Redirect::route('listers.index');
	}

	/**
	 * Display the specified lister.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$lister = Lister::findOrFail($id);

		return View::make('listers.show', compact('lister'));
	}

	/**
	 * Show the form for editing the specified lister.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$lister = Lister::find($id);

		return View::make('listers.edit', compact('lister'));
	}

	/**
	 * Update the specified lister in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$lister = Lister::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Lister::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$lister->update($data);

		return Redirect::route('listers.index');
	}

	/**
	 * Remove the specified lister from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Lister::destroy($id);

		return Redirect::route('listers.index');
	}

}
