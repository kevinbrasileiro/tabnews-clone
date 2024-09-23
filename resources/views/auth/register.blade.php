<x-layout>
    <x-forms.form method="POST" action="/register" enctype="multipart/form-data" class="max-w-lg">
        <x-page-header>Register</x-page-header>
        <x-forms.input label="Username" name="username" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <x-forms.button>Register</x-forms.button>
    </x-forms.form>
</x-layout>