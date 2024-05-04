<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\student;
use App\Models\User;
use views\Student\create;
use views\Student\index;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user    = auth()->user();
        // $students = $user->isAdmin ? Student::latest()->get() : $user->students;
        // return view('student.index', compact('students'));

        $students = Student::all(); // Fetch students from the database
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $student = Student::create([
                'name'       => $request->name,
                'age' => $request->age,
                'user_id'     => auth()->id(),
            ]);
    
            if ($request->file('image')) {
                $this->storeImage($request, $student);

            }
    
            return redirect(route('student.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Student $student)
    {
        $student->update($request->except('image'));

        if ($request->has('status')) {
            // $user = User::find($ticket->user_id);
           // $ticket->user->notify(new TicketUpdatedNotification($ticket));
        }

        if ($request->file('image')) {
            $student->delete($student->image);
            $this->storeImage($request, $student);
        }
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('student.index'));
    }

    protected function storeImage($request, $student)
    {
        $ext      = $request->file('image')->extension();
        $contents = file_get_contents($request->file('image'));
        $filename = Str::random(25);
        $path     = "images/$filename.$ext";
        Storage::disk('public')->put($path, $contents);
        $student->update(['image' => $path]);

    
    }

    
}
