<x-app-layout>
    <div class="py-12">
        <div class="mb-6 felx-flex-row-reverse">
            <div class="mx-auto w-1/2 bg-gray-200 rounded-xl shadow-lg px-2 py-4">
                <form action="{{ route('contacto.procesar') }}" method="POST">
                    @csrf
                    <x-jet-label class="mb-2">Nombre</x-jet-label>
                    <x-jet-input type="text" name="nombre" placeholder="Tu nombre" class="w-full"
                        value="{{ old('nombre') }}" />
                        <x-jet-input-error for="nombre" />
                        <x-jet-label class="mb-2">Email</x-jet-label>
                    <x-jet-input type="email" name="email" placeholder="Tu correo" class="w-full"
                        value="{{ old('email') }}" />
                        <x-jet-input-error for="email" />
                    <x-jet-label class="mb-2">Contenido del mensaje</x-jet-label>
                    <textarea name="contenido" rows="4"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        >{{ old('contenido') }}
                    </textarea>
                <x-jet-input-error for="contenido" />

                <div class="flex flex-row-reverse mt-2">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-plane"></i> Enviar
                    </button>

                    <a href="{{route('dashboard')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fa-solid fa-xmark"></i> Volver
                    </a>

                </div>
        </div>
    </div>
</x-app-layout>