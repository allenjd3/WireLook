<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if (! app()->environment('testing'))
        @vite(config('wirelook.stylesheet_paths'))
    @endif
    <style>{{ \Allenjd3\Wirelook\Wirelook::css() }}"</style>
</head>
<body>
<div>
    @livewireStyles
        @foreach($keys as $key)
            <div>
                <a href="{{ route('wirelook', ['component' => $key]) }}">{{ $key }}</a>
            </div>
        @endforeach
        <div class="border-red">
            @if (isset($componentName))
                @livewire($componentName)
            @endif
        </div>
    @livewireScripts
</div>
</body>
</html>
