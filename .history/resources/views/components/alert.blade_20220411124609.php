<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <x-alert type="success">
	Yay!
</x-alert>
    <div class="alert alert-{{ $type }}">
        {{ $slot }}
    </div>
</div>