<!DOCTYPE html>
<html>
<head>
    <title>Generated Check</title>
</head>
<body>
    <!-- Position the fields using inline styles -->
    @foreach ($fields as $field => $value)
        <div style="{{ $value }}">{{ $field }}</div>
    @endforeach
</body>
</html>
