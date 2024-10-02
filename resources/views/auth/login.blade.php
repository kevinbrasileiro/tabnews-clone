<x-layout>
    <x-forms.form method="POST" action="/login" class="max-w-lg">
        <x-page-header>Login</x-page-header>
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Password" name="password" type="password" />
        <a href="/forgot-password" class="text-sm text-gray-500 hover:underline cursor-pointer">Forgot password?</a>

        <div class="space-x-2">
            <x-forms.button>Login</x-forms.button>
            <a href="/register" class="hover:underline">Don't have an account?</a>
        </div>
    </x-forms.form>
</x-layout>