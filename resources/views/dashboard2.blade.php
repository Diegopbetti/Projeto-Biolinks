<x-layout.app>
    <x-container>
        <x-card>
            <div class="text-center space-y-2">
                <x-img src="/storage/{{ $user->photo }}" alt="Photo profile" />
                <div class="font-bold text-2xl tracking-wider">{{ $user->name }}</div>
                <div class="text-sm opacity-80">{{ $user->description }}</div>
                <ul class="space-y-2">
                    @foreach ($links as $link)
                        <li class="flex items-center gap-2">
                            @unless ($loop->last)
                            
                            <form :route="{{ route('links.down', $link) }}" patch>     
                                <x-button>⬇️</x-button>
                            </form>
                            @endunless

                            @unless ($loop->first)

                            <form :route="{{ route('links.up', $link) }}" patch>
                                <x-button>⬆️</x-button>
                            </form>
                            @endunless

                            <x-button href="{{ route('links.edit', $link) }}" block outline info>
                                {{ $link->name }}
                            </x-button>
                            <form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Tem certeza?')">
                                <x-button ghost><x-icons.trash class="w-6 h-6"/></x-button>
                            </form> 
                        </li>
                    @endforeach
                </ul>
            </div>
        </x-card>
    </x-container>
</x-layout.app>