<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('food.store') }}">
                        @csrf

                        <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                     required autofocus/>
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')"/>

                            <x-input id="price" class="block mt-1 w-full" type="number" name="price"
                                     :value="old('price')" required autofocus min="0"/>
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <x-button class="ml-3">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                </div>
            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-black">
                    <thead class="text-xs uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($food) && count($food)>0)
                        @foreach($food as $item)
                            <tr class="bg-white border-b text-gray-400 hover:bg-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                    {{$item->name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{number_format($item->price, 0, ',', ' ');}}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="post" action="{{route('food.destroy',$item->id)}}"
                                          id="delete-{{$item->id}}">
                                        @csrf
                                        <a onclick="document.getElementById('delete-{{$item->id}}').submit();"
                                           class="font-medium text-blue-600 cursor-pointer dark:text-blue-500 hover:underline">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr class="bg-white border-b text-gray-400">
                            <td class="px-6 py-4 font-medium" colspan="3">Empty</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
