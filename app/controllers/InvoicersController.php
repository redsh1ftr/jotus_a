<?php

class InvoicersController extends \BaseController {

	/**
	 * Display a listing of invoicers
	 *
	 * @return Response
	 */
	public function index()
	{
		$invoicers = Invoicer::all();

		return View::make('invoicers.index', compact('invoicers'));
	}

	/**
	 * Show the form for creating a new invoicer
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('invoicers.create');
	}

	/**
	 * Store a newly created invoicer in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Invoicer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Invoicer::create($data);

		return Redirect::route('invoicers.index');
	}

	/**
	 * Display the specified invoicer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$invoicer = Invoicer::findOrFail($id);

		return View::make('invoicers.show', compact('invoicer'));
	}

	/**
	 * Show the form for editing the specified invoicer.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$invoicer = Invoicer::find($id);

		return View::make('invoicers.edit', compact('invoicer'));
	}

	/**
	 * Update the specified invoicer in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$invoicer = Invoicer::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Invoicer::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$invoicer->update($data);

		return Redirect::route('invoicers.index');
	}

	/**
	 * Remove the specified invoicer from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Invoicer::destroy($id);

		return Redirect::route('invoicers.index');
	}

}
