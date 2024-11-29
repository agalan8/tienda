<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver factura
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Número
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $factura->numero }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Fecha
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $factura->created_at }}
                            </dd>
                        </div>
                        <div class="flex flex-col pt-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Usuario
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $factura->user->name }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>




    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Artículos
            </h2>
            <br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Código
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Denominación
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Precio
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articulos as $articulo)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                                        <td class="px-6 py-4">
                                            <a href="{{route('articulos.show', $articulo)}}">
                                                {{ $articulo->denominacion}}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $articulo->precio }}
                                        </td>
                                        <td class="px-6 py-4 flex items-center">
                                            {{-- <a href="{{ route('facturas.edit', $factura) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a> --}}
                                            <form method="POST" action="{{ route('facturas.destroy', $factura) }}">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{ route('facturas.destroy', $factura) }}"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                                                    onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                                                    Eliminar
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="{{ route('facturas.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Añadir un articulo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>