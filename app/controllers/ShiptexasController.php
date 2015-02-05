<?php

class ShiptexasController extends \BaseController {

	/**
	 * Display a listing of shiptexas
	 *
	 * @return Response
	 */
	public function index()
	{
		$shiptexas = Shiptexa::all();

		return View::make('shiptexas.index', compact('shiptexas'));
	}

	/**
	 * Show the form for creating a new shiptexa
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('shiptexas.create');
	}

	/**
	 * Store a newly created shiptexa in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Shiptexa::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Shiptexa::create($data);

		return Redirect::route('shiptexas.index');
	}

	/**
	 * Display the specified shiptexa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shiptexa = Shiptexa::findOrFail($id);

		return View::make('shiptexas.show', compact('shiptexa'));
	}

	/**
	 * Show the form for editing the specified shiptexa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shiptexa = Shiptexa::find($id);

		return View::make('shiptexas.edit', compact('shiptexa'));
	}

	/**
	 * Update the specified shiptexa in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$shiptexa = Shiptexa::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Shiptexa::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$shiptexa->update($data);

		return Redirect::route('shiptexas.index');
	}

	/**
	 * Remove the specified shiptexa from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Shiptexa::destroy($id);

		return Redirect::route('shiptexas.index');
	}

}
