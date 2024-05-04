<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-4xl w-full px-6 py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-white text-3xl font-bold">Student List</h1>
            <a href="{{ route('student.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Add New Student</a>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            @forelse ($students as $student)
                <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4 flex justify-between items-center">
                    <a href="{{ route('student.show', $student->id) }}" class="text-blue-500 hover:underline">{{ $student->name }}</a>
                    <p class="text-gray-500">{{ $student->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <div class="px-6 py-4">
                    <p class="text-gray-500">No students found.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
