<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Info</title>
</head>
<body>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        @method('post')
        <div>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <section class="note">
            <h1>Create Student Info</h1>
            <div class="fields">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="course">Course:</label>
                    <input type="text" name="course" id="course">
                    <label for="year">Year Level:</label>
                    <input type="text" name="year">
                </div>
                <div class="form-actions">
                    <button type="submit">Save</button>
                    <a href="{{ route('students.view') }}" class="button">Back</a>
                </div>
            </div>
        </section>
    </form>
</body>
</html>
