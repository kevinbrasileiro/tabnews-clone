<x-layout>
    <x-forms.form method="POST" action="/forgot-password" class="max-w-lg">
        <x-page-header>Reset Password</x-page-header>
        @if (!session('status'))
            <x-forms.input label="Email" name="email" type="email" />
            <x-forms.button>Send Reset Link</x-forms.button>
        @endif
        @if (session('status'))
            <p class="text-green-700 mt-1">{{ session('status') }} You may close this window.</p>
        @endif
    </x-forms.form>
</x-layout>