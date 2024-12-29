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
                    @foreach($components as $component)
                    <li>
                        <a
                            href="{{ route('wirelook', ['component' => $component['slug']]) }}"
                            @class(["component__link", "component__link--active" => request()->get('component') === $component['slug']])
                        >{{ $component['slug'] }}</a>
                        <ul>
                            @foreach($component['variants'] as $variant)
                                <li><a href="{{ route('wirelook', ['component' => $component['slug'], 'variant' => $variant]) }}" class="component__sublink">{{ ucfirst($variant) }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </aside>
            <main>
                <div class="card">
                    @if (isset($componentName))
                        @livewire($componentName, $props)
                    @endif
                </div>
            </main>
        </div>
    @livewireScripts
</div>
</body>
</html>
