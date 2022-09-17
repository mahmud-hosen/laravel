<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $animal = array();
        $animal = [
            'Human' => [
                'name' => 'Mahmud',
                'age' => 30,
                'Old' => [
                    'name' => 'Kamal',
                ],
            ],
            'Cow' => [
                'name' => 'Maba',
                'age' => 10,
            ],
        ];
        return view('teacher.info', ['animal' => $animal]);
    }

    public function edit(Teacher $teacher)
    {
        //
    }

    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    public function destroy(Teacher $teacher)
    {
        //
    }
}
