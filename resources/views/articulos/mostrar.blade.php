<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <img class="rounded-t-lg" src="{{ Storage::url($article->imagen) }}" />

                <div class="p-5">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Nombre : {{ $article->nombre }}</h5>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> Descripcion :
                        {{ $article->descripcion }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Precio : {{ $article->decimal }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Stock : {{ $article->stock }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Creado Por: {{ $article->user->name }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Hora de creacion: {{ $article->created_at }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ultima Modificacion : {{ $article->updated_at }}</p>

                    <a href="{{ route('MisArticulos') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Volver
                    </a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
