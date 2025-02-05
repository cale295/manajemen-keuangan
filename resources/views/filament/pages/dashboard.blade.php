<x-filament-panels::page>
    <div class="space-y-4">
        @foreach ($this->getWidgets() as $widget)
            {{ $widget }}
        @endforeach
    </div>
</x-filament-panels::page>
