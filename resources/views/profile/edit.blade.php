<x-layout>
    <x-forms.form method="POST" action="/profile" class="max-w-lg">
        <x-page-header>Edit Profile</x-page-header>
        <x-forms.input label="Username" name="username" value="{{ old('username', $user->username) }}"/>
        <x-forms.input label="Email" name="email" type="email" value="{{ old('email', $user->email) }}" />
        <x-forms.textarea rows="10" label="Description" name="description" value="{{ old('description', $user->description) }}"/>
        <x-forms.button>Save</x-forms.button>
    </x-forms.form>
</x-layout>