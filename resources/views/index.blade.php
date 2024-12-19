<div>
    @livewireStyles
        @foreach($keys as $key)
            <div>
                <a href="{{ route('wirelook', ['componentName' => $key]) }}">{{ $key }}</a>
            </div>
        @endforeach
        @if (isset($componentName))
            @livewire($componentName)
        @endif
    @livewireScripts
</div>
