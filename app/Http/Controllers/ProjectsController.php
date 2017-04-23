<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Validation rules
     *
     * @return array
     */
    private function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    /**
     * Create a Project
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        // request data
        $data = $request->all();

        // Validate the request
        $this->validate($request, $this->rules());

        // If persisting data failed throw an internal error
        if ( ! $project = Project::create($data, ['user_id' => 10]))
            return $this->responseError('Ops, Something happened. Please try again.');

        // Return success message
        return $this->responseSuccess('Project created.');
    }
}
