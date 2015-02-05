<?php

class FormbuildersController extends \BaseController {

	/**
	 * Display a listing of formbuilders
	 *
	 * @return Response
	 */
	public function index()
	{
		$formbuilders = Formbuilder::all();

		return View::make('formbuilders.index', compact('formbuilders'));
	}

	/**
	 * Show the form for creating a new formbuilder
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('formbuilders.create');
	}

	/**
	 * Store a newly created formbuilder in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Formbuilder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Formbuilder::create($data);

		return Redirect::route('formbuilders.index');
	}

	/**
	 * Display the specified formbuilder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$formbuilder = Formbuilder::findOrFail($id);

		return View::make('formbuilders.show', compact('formbuilder'));
	}

	/**
	 * Show the form for editing the specified formbuilder.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$formbuilder = Formbuilder::find($id);

		return View::make('formbuilders.edit', compact('formbuilder'));
	}

	/**
	 * Update the specified formbuilder in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$formbuilder = Formbuilder::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Formbuilder::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$formbuilder->update($data);

		return Redirect::route('formbuilders.index');
	}

	/**
	 * Remove the specified formbuilder from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Formbuilder::destroy($id);

		return Redirect::route('formbuilders.index');
	}

}
