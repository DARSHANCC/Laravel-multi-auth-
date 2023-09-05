<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
            {{ Auth::guard('admin')->user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                                <li class="breadcrumb-item active" aria-current="page">Show User</li>
                            </ol>
                        </nav>
                        <hr class="mb-3">

                        <div class="row justify-content-center">

                            <div class="container" style="width:65%;">
                                <div class="mb-3">
                                    <h1 class="h1">
                                        {{ __('User Name:') }}
                                        {{ $user->name }}</h1>
                                    {{ __('User Id:') }}
                                    {{ $user->id }}
                                </div>

                                <div class="h5 mb-3">
                                    {{ __('User Email :') }}
                                    <a class="sub disabled" style="text-decoration: none">{{ $user->email }}</a>
                                </div>
                                <p>
                                    {{ __('Craeted At:') }}
                                    {{ $user->created_at }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
