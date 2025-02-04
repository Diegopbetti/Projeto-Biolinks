<x-layout.app>
    <x-container>
        <x-card title="Profile">
            <x-form :route="route('profile')" post id="form" enctype="multipart/form-data">
                <div>
                    <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture" />
                    <input type="file" name="photo">
                </div>
                <x-input name="name" placeholder="Name" value="{{ old('name', $user->name) }}" />
                <x-textarea name="description" value="{{ old('description', $user->description) }}" />
                <x-input name="handler" placeholder="Handler" value="{{ old('handler', $user->handler) }}" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard2')">Cancel</x-a>
                <x-button type="submit" form="form">Update link</x-button>    
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
