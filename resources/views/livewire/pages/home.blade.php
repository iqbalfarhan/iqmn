<div class="space-y-6">
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="stats shadow-lg">
            <div class="stat">
                <div class="stat-title">Total Page Views</div>
                <div class="stat-value">89,400</div>
                <div class="stat-desc">21% more than last month</div>
            </div>
        </div>

        <div class="stats shadow-lg">
            <div class="stat">
                <div class="stat-figure">
                    <div class="avatar">
                        <div class="w-16 rounded-full">
                            <img src="{{ auth()->user()->image_url }}" />
                        </div>
                    </div>
                </div>
                <div class="stat-value text-primary">.IQMN</div>
                <div class="stat-title">{{ auth()->user()->name }}</div>
                <div class="stat-desc">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>
    <div class="space-y-4">
        <h1 class="text-xl">Material belajarku</h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($materials as $material)
                @livewire('material.item', ['material' => $material], key($material->id))
            @endforeach
        </div>
    </div>
</div>
