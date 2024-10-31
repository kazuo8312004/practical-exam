<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
</head>
<body>
        <div>
         <h1>Student Info:</h1>
         Name: {{ $student->name }}</h1:>
            <p>Email: {{ $student->email }}</p>
        </div>
        <div>
            <p>Course: {{ $student->course }}</p>
        </div>
        <div>
            <p>Year Level: {{ $student->year }}</p>
        </div>
        <div class="note-actions">
            <a href="{{ route('students.view') }}" class="button">Back to Student List</a>
            <a href="{{ route('students.edit', $student) }}" class="button">Edit</a>
        </div>
    </form>
</body>
</html>
