<x-layout>
    <x-forms.form method="POST" action="/reset-password" class="max-w-lg">
        <x-page-header>Reset Password</x-page-header>
        <x-forms.input label="Email" name="email" type="email" :value="$email" />
        <x-forms.input label="Password" name="password" type="password" />
        <x-forms.input label="Confirm Password" name="password_confirmation" type="password" />
        <x-forms.input :label="false" name="token" type="hidden" value="{{$token}}"/>

        <x-forms.button>Reset Password</x-forms.button>
    </x-forms.form>
</x-layout>