<x-app-layout title="Login">
    <x-slot name="heading">Login</x-slot>
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <label for="email">Email</label>
            <input value="{{old('email')}}" class="border px-4 py-2 rounded block" type="email" name="email" id="email">
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input class="border px-4 py-2 rounded block" type="password" name="password" id="password">
            @error('password')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>

            @enderror
        </div>
        <x-button class="mt-6">
           Login
        </x-button>
    </form>
</x-app-layout>
