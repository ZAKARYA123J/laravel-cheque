<!-- resources/views/Auth/register.blade.php -->

@if(session('error'))
    <div>{{ session('error') }}</div>
@endif

<form action="{{ route('registerPost') }}" method="post">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Register</button>
</form>
