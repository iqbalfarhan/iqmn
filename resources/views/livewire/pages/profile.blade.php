<div class="space-y-6">
    <div class="flex justify-between items-center">
        
        <div>
            <h1 class="text-4xl font-bold">{{ $user->name }}</h1>
            
            <span>{{ $user->email }}</span>
        </div>
        <div>
            <div class="avatar">
                <div class="w-24 rounded-full">
                    <img src="{{ $user->image_url }}" />
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="join bg-base-200 join-vertical rounded-xl w-full">
        <div class="card">
            <div class="card-body">
                <div class="flex flow-row justify-between items-center">
                    <div>
                        <h3 class="card-title">Stacked sidebar</h3>
                    </div>
                    <div>
                        <input type="checkbox" class="toggle" checked />
                    </div>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <div class="card">
            <div class="card-body">
                <div class="flex flow-row justify-between items-center">
                    <div>
                        <h3 class="card-title">Dark mode</h3>
                    </div>
                    <div>
                        <input type="checkbox" class="toggle" checked />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
