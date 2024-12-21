<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (! app()->environment('testing'))
        @vite(config('wirelook.stylesheet_paths'))
    @endif
</head>
<body>
<div>
    @livewireStyles
        @foreach($keys as $key)
            <div>
                <a href="{{ route('wirelook', ['component' => $key]) }}">{{ $key }}</a>
            </div>
        @endforeach
        @if (isset($componentName))
            @livewire($componentName)
        @endif
    @livewireScripts
</div>
</body>
</html>
