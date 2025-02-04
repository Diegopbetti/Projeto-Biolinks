<x-layout.app>
    <x-container>
        <x-card title="Login">
            <x-form :route="route('login2')" post id="login-form">
                <x-input name="email" placeholder="Email" value="{{ old('email') }}" />
                <x-input name="password" placeholder="Password" type="password" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('register2')">I need to create a new account!</x-a>
                <x-button type="submit" form="login-form">Login</x-button>    
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
