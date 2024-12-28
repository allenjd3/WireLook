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
        <header class="dashboard__header">
            Wirelook
        </header>
        <div class="dashboard">
            <aside>
                <ul>
                    @foreach($keys as $key)
                    <li>
                        <a
                            href="{{ route('wirelook', ['component' => $key]) }}"
                            @class(["component__link", "component__link--active" => request()->get('component') === $key])
                        >{{ $key }}</a>
                        <ul>
                            <li><a href="#" class="component__sublink">Default</a></li>
                            <li><a href="#" class="component__sublink">Blue</a></li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </aside>
            <main>
                <div class="card">
                    @if (isset($componentName))
                        @livewire($componentName)
                    @endif
                </div>
            </main>
        </div>
    @livewireScripts
</div>
</body>
</html>
