<x-app-layout title="Users">
    <x-slot name="heading">{{$user->name}}</x-slot>

    <form action="/users/{{$user->id}}" method="post" class="mt-6">
        @method('DELETE')
        @csrf
        <x-button type="submit">
            DELETE
        </x-button>
    </form>
</x-app-layout>
