<div class="bg-white rounded p-8">
    <h2 class="text-2xl mb-4">Update Product</h2>
    <form action="/api/products/{{$product->id}}" method="POST" 
          hx-post="/api/products/{{$product->id}}" 
          hx-target="#edit-product-modal" 
          hx-swap="innerHTML"
          hx-trigger="htmx:afterRequest: #product-list"
          hx-on="htmx:afterRequest: htmx.ajax('GET', '/api/products', {target: '#product-list', swap: 'innerHTML'})"
          onsubmit="hideEditModal()">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{$product->name}}" class="border rounded px-3 py-2 mb-4 w-full">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="border rounded px-3 py-2 mb-4 w-full">{{$product->description}}</textarea>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{$product->price}}" class="border rounded px-3 py-2 mb-4 w-full">
        <label for="imgUrl">ImageUrl:</label>
        <input type="text" id="imgUrl" name="imgUrl" value="{{$product->imgUrl}}" class="border rounded px-3 py-2 mb-4 w-full">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        <button type="button" onclick="hideEditModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Close</button>
    </form>
</div>


<script>
    function showEditModal() {
        document.getElementById('edit-product-modal').classList.remove('hidden');
    }

    function hideEditModal() {
        document.getElementById('edit-product-modal').classList.add('hidden');
    }
</script>