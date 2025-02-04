<x-layout.app>
    <x-container>
        <x-card title="Register">
            <x-form :route="route('register2')" post id="register-form">
                <x-input name="name" placeholder="Name" value="{{ old('name') }}" />
                <x-input name="email" placeholder="Email" value="{{ old('email') }}" />
                <x-input name="email_confirmation" placeholder="Email Confirmation" />
                <x-input name="password" placeholder="Password" type="password" />
            </x-form>
            <x-slot:actions>
                <x-a :href="route('login2')">Already have an account!</x-a>
                <x-button type="submit" form="register-form">Register</x-button>    
            </x-slot:actions>
        </x-card>
    </x-container>
    
</x-layout.app>
