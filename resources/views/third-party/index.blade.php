<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('第三方服務') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success mb-3">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="flex justify-end mb-3">
                        <button class="btn btn-success" onclick="location.href = '{{route("third-parties.create")}}'">新增</button>
                    </div>
                    <livewire:third-party.list-third-parties/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
