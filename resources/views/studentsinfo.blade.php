<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Info</title>
    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this student?')) {
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <header>
        <h1>Students Information Management</h1>
    </header>
    <section>
        <table bgcolor="pink" width="960">
            <thead>
                <tr bgcolor="grey">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}">update</a>
                        <a href="{{ route('students.show', $student->id) }}">view</a>
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
