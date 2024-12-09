<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md rounded-lg p-6">
                <h3 class="text-lg font-medium mb-4">Edit Product</h3>
                
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-none text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('product.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        
                        <div>
                            <label for="productname" class="block text-gray-700">Product Name</label>
                            <input type="text" id="productname" name="productname" value="{{ old('productname', $product->productname) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="category" class="block text-gray-700">Category</label>
                            <input type="text" id="category" name="category" value="{{ old('category', $product->category) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="stock_quantity" class="block text-gray-700">Stock Quantity</label>
                            <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="description" class="block text-gray-700">Description</label>
                            <input type="text" id="description" name="description" value="{{ old('description', $product->description) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <div>
                            <label for="manufacturer" class="block text-gray-700">Manufacturer</label>
                            <input type="text" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $product->manufacturer) }}" 
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
