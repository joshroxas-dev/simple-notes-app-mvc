<?php

namespace App\Controllers;

class Notes extends BaseController
{
	public function index_json()
	{
		$notesModel = model('App\Models\Note');
		$data['notes'] = $notesModel->findAll();
		echo json_encode($data);
	}
	public function index_html()
	{
		$notesModel = model('App\Models\Note');
		$data['notes'] = $notesModel->findAll();
		echo view('partials/notes', $data);
	}
	public function index()
	{
		return view('index');
	}

	public function create()
	{
		$notesModel = model('App\Models\Note');
		$note = array(
			'title' => $this->request->getPost('title'),
			'description' => $this->request->getPost('description')
		);
		$notesModel->insert($note);
		$data['notes'] = $notesModel->findAll();
		echo view('partials/notes', $data);
	}

	public function update($id) {
		$notesModel = model('App\Models\Note');
		$note = array(
			'title' => $this->request->getPost('title'),
			'description' => $this->request->getPost('description')
		);
		$notesModel->update($id, $note);
		$data['notes'] = $notesModel->findAll();
		echo view('partials/notes', $data);
	}

	public function destroy($id)
	{
		$notesModel = model('App\Models\Note');
		$notesModel->delete($id);
		$data['notes'] = $notesModel->findAll();
		echo view('partials/notes', $data);
	}
}
