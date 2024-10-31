<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    <form method="POST" action="{{ route('students.update', ['student' => $student]) }}">
        @csrf
        @method('PUT')
        <section>
            <h1>Edit Note</h1>
            <div>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $student->name }}">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" value="{{ $student->email }}">
                </div>
            </div>
            <div>
                <label for="course">Course:</label>
                <input name="content" id="content" value="{{ $student->course }}">
            </div>
            <div>
                <label for="year">Year level:</label>
                <input name="year" id="year" value="{{ $student->year }}">
            </div>
            <div>
                <button type="submit">Update</button>
                <a href="{{ route('students.view') }}" class="button">Back</a>
                <a href="{{ route('students.show', $student->id) }}">view</a>

            </div>
        </section>
    </form>
</body>
</html>
