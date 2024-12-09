<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <div class="mb-8">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('deleted'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            {{ session('deleted') }}
                        </div>
                    @endif

                    <h3 class="text-lg font-medium mb-4">Add New Product</h3>
                    <form method="POST" action="{{ route('product.store') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="productname" class="block text-gray-700 font-medium">Product Name</label>
                                <input type="text" id="productname" name="productname" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="category" class="block text-gray-700 font-medium">Category</label>
                                <input type="text" id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="price" class="block text-gray-700 font-medium">Price</label>
                                <input type="number" id="price" name="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="stock_quantity" class="block text-gray-700 font-medium">Stock Quantity</label>
                                <input type="number" id="stock_quantity" name="stock_quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="description" class="block text-gray-700 font-medium">Description</label>
                                <input type="text" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                            <div>
                                <label for="manufacturer" class="block text-gray-700 font-medium">Manufacturer</label>
                                <input type="text" id="manufacturer" name="manufacturer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm p-2">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md shadow-md">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>

                <div class="mt-10">
                    <h3 class="text-lg font-medium mb-4">Product List</h3>
                    <table class="min-w-full bg-white border-collapse border border-gray-200 rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 border text-center">#</th>
                                <th class="py-2 px-4 border text-center">Product Name</th>
                                <th class="py-2 px-4 border text-center">Category</th>
                                <th class="py-2 px-4 border text-center">Price</th>
                                <th class="py-2 px-4 border text-center">Stock Quantity</th>
                                <th class="py-2 px-4 border text-center">Descriptions</th>
                                <th class="py-2 px-4 border text-center">Manufacturer</th>
                                <th class="py-2 px-4 border text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border text-center">{{ $key + 1 }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->productname }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->category }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->price }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->stock_quantity }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->description }}</td>
                                    <td class="py-2 px-4 border text-center">{{ $product->manufacturer }}</td>

                                    <td class="py-2 px-4 border-b px-4">
                                        <a href="{{ route('product.edit', $product->id)}}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form method="POST" action="{{ route('product.destroy', $product->id) }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
