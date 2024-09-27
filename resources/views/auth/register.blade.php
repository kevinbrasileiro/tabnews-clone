<x-layout>
    <x-forms.form method="POST" action="/register" enctype="multipart/form-data" class="max-w-lg">
        <x-page-header>Register</x-page-header>
        <x-forms.input label="Username" name="username" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />

        <div class="space-x-2">
            <x-forms.button>Register</x-forms.button>
            <a href="/login" class="hover:underline">Already have an account?</a>
        </div>

        
    </x-forms.form>
</x-layout>