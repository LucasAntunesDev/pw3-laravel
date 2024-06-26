{{-- resources/views/animals/index.blade.php --}}

@extends('base')

@section('titulo', 'Animais para doação')

@section('conteudo')

<main class="flex flex-col gap-x-4 w-6/12 mx-auto">
    <header class="flex py-4 justify-evenly w-auto px-6">
        <div class="flex flex-col">
            <h1 class="font-bold">Animais</h1>
            <p class="mx-auto inline-flex text-neutral-600 text-md">Veja nossa lista de animais para doação</p>
        </div>

        <a href="{{ route('animals.register') }}"
            class="inline-flex gap-x-2 items-center bg-teal-600 hover:bg-teal-700 p-2 rounded-xl transition duration-300 ease-in-out cursor-pointer shadow text-sm focus:ring-2 focus:ring-teal-400 text-white">Cadastrar
            animal <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
    </header>

    <table class="w-10/12 mx-auto my-4">
        <tr class="*:border-b *:border-b-gray-200 *:py-2 *:text-start">
            <th>Nome</th>
            <th>Idade</th>
            <th></th>
            <th></th>
        </tr>

        @foreach ($animals as $animal)
        <tr class="*:border-b *:border-b-gray-200 *:p-2 p-2">
            <td>{{$animal->name}}</td>
            <td>{{$animal->age}}</td>

            <td class="my-4">
                <a href="{{route('animals.edit', $animal->id)}}"
                    class="inline-flex items-center gap-x-2 border-[1px] border-teal-600 text-teal-600 hover:bg-teal-600 p-2 rounded-xl hover:text-white transition duration-300 ease-in-out cursor-pointer shadow text-sm focus:ring-2 focus:ring-teal-400 mr-10">
                    {{-- Editar --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                </a>

                <a href="{{route('animals.delete', $animal->id)}}"
                    class="inline-flex items-center gap-x-2 border-[1px] border-rose-600 text-rose-600 hover:bg-rose-600 p-2 rounded-xl hover:text-white transition duration-300 ease-in-out cursor-pointer shadow text-sm focus:ring-2 focus:ring-rose-400">
                    {{-- Apagar --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
            </td>

        </tr>
        @endforeach

    </table>
</main>

@endsection