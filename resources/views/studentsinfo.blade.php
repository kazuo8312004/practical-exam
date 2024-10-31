<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this note?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @method('POST')
    <header>
        <h1>Students Information Management</h1>
    </header>
    <section>
        <table bgcolor="pink" width="960">
            <thead>
                <tr bgcolor="grey">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Year Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->course }}</td>
                        <td>{{ $student->year }}</td>
                        <td>
                            <a href="{{ route('students.update', ['student' => $student]) }}">update</a>
                            <a href="{{ route('students.view', ['student' => $student]) }}">view</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <footer>
        <a href="{{ route('students.create') }}">Create</a>
    </footer>
</body>
</html>
