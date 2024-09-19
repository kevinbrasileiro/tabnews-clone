<x-layout>
    <x-forms.form method="POST" action="/login">
        <h1 class="font-bold text-4xl mb-8">Login</h1>
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Register</x-forms.button>
    </x-forms.form>
</x-layout>