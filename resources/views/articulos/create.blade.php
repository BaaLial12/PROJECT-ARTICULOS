<x-app-layout>
    <div class="py-12">
        <div class="mb-6 felx-flex-row-reverse">
            <div class="mx-auto w-1/2 bg-gray-200 rounded-xl shadow-lg px-2 py-4">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-jet-label class="mb-2">Nombre</x-jet-label>
                    <x-jet-input type="text" name="nombre" placeholder="Nombre" class="w-full"
                        value="{{ old('nombre') }}" />
                        <x-jet-input-error for="nombre" />
                    <x-jet-label class="mb-2">Descripcion</x-jet-label>
                    <textarea name="descripcion" cols="30" rows="4"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"
                        >{{ old('descripcion') }}
                    </textarea>
                <x-jet-input-error for="descripcion" />

                <x-jet-label class="mb-2">Stock</x-jet-label>
                    <x-jet-input type="number" name="stock" placeholder="Stock" step="1" class="w-full"
                        value="{{ old('stock') }}" />
                        <x-jet-input-error for="stock" />

                        <x-jet-label class="mb-2">Precio</x-jet-label>
                        <x-jet-input type="number" name="decimal" placeholder="Decimal" step="0.01" class="w-full"
                            value="{{ old('decimal') }}" />
                            <x-jet-input-error for="decimal" />
                    
                    <x-jet-label class="mb-2" for="imagen">Imagen del Articulo</x-jet-label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none " id="imagen" name="imagen" type="file" accept="image/*">

                    <div class="mx-auto mt-2">
                        <img src="{{Storage::url('noimagen.jpg')}}" id="img" class="object-cover object-center" alt="No imagen">
                    </div>

                    <x-jet-input-error for="imagen" />

                    <div class="flex flex-row-reverse mt-2">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-save"></i> Guardar
                        </button>

                        <a href="{{route('MisArticulos')}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>

                    </div>



                </form>
            </div>
        </div>
    </div>
</x-app-layout>
