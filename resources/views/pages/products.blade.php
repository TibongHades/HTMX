@extends('base.base')

@section('content')
<div class="mb-3">
    <h1 class="text-4xl">Products</h1>
    <div class="flex justify-between items-center mt-3">
        <form 
            hx-get="/api/products"
            hx-trigger="submit"
            hx-target="#products_list"
            class="flex items-center">
            <input type="text" 
                   name="filter" 
                   class="p-2 border border-gray-300"
                   placeholder="Search for an item...">
            <button type="submit" 
                    class="p-2 bg-blue-500 text-white rounded-r-full">Search</button>
        </form>
        <button class="p-2 bg-blue-500 text-white rounded" 
                onclick="showAddProductModal()">Add Product</button>
    </div>
</div>
<hr>
<div id="products_list"
        class="flex mt-3 flex-wrap gap-3 justify-between"
        hx-get="/api/products" 
        hx-trigger="load delay:100ms"
        hx-swap="innerHTML">
</div>

<div id="addProductModal" class="hidden fixed inset-0 z-50 bg-gray-600 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow-md w-1/3">
        <h2 class="text-2xl mb-4">Create Product</h2>
        <form id="addProductForm"
              method="POST" 
              hx-post="/api/products/create"
              hx-trigger="submit"
              hx-swap="beforeend"
              hx-target="#products_list"
              hx-on="htmx:afterRequest:productAdded">
            <div class="mb-4">
                <label class="block text-gray-700">Image URL:</label>
                <input type="text" id="imgUrl" name="imgUrl" class="w-full p-2 border border-gray-300 rounded">
                <div id="imgUrl_Error"></div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Product Name:</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded">
                <div id="name_Error"></div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Description:</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded"></textarea>
                <div id="description_Error"></div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Price:</label>
                <input id="price" type="number" name="price" class="w-full p-2 border border-gray-300 rounded">
                <div id="price_Error"></div>
            </div>
            <div class="mb-4" id="addMessage"></div>
            <div class="flex justify-between mt-3">
                <button type="submit" 
                        class="p-2 bg-blue-500 text-white rounded">Save Product</button>
                <button type="button" 
                        class="p-2 ml-auto bg-gray-500 bg-red-500 text-white rounded"
                        onclick="hideAddProductModal()">Close</button>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
    function showAddProductModal() {
        clearForm();
        document.getElementById('addProductModal').classList.remove('hidden');
    }
    function hideAddProductModal() {
        document.getElementById('addProductModal').classList.add('hidden');
    }
    function clearForm() {
        document.getElementById('addProductForm').reset();
    }
</script>
