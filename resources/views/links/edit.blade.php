<x-layout.app>
    <x-container>
        <x-card title="Edit link:: id {{ $link->id }}">
            <x-form :route="route('links.edit')" post id="form">
                <x-input name="link" placeholder="Link" value="{{ old('link', $link->link) }}" />
                <x-input name="name" placeholder="Name" value="{{ old('name', $link->name) }}" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard2')">Cancel</x-a>
                <x-button type="submit" form="form">Create a new link</x-button>    
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
