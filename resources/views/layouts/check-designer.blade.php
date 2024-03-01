@extends('app')

@section('title', 'check designer')


@section('content')


<h1>Check Design</h1>
    <form action="{{ route('check-designer.save') }}" method="POST">
        @csrf
        <!-- Display check design parameters -->
        @foreach ($designParams as $param)
        <input type="text" name="fields[{{ $param->field_name }}][]" style="
        position: absolute;
        left: {{ $param->x_position }}px;
        top: {{ $param->y_position }}px;
        width: {{ $param->width }}px;
        height: {{ $param->height }}px;">
@endforeach
        <button type="submit">Generate Check</button>
    </form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // ... previous JavaScript ...

    function saveFieldPosition($field) {
        var id = $field.data('id');
        var x = $field.position().left;
        var y = $field.position().top;
        var width = $field.width();
        var height = $field.height();

        $.ajax({
            url: '/save-check-design',
            method: 'POST',
            data: {
                id: id,
                x_position: x,
                y_position: y,
                width: width,
                height: height
            },
            success: function (response) {
                console.log(response.message);
            },
            error: function (error) {
                console.error(error.responseJSON.message);
            }
        });
    }
</script>



@endsection
