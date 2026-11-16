@if (session('message'))
    <p class="message" role="status">{{ session('message') }}</p>
@endif

@if ($errors->any())
    <ul class="errors" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
