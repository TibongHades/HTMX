@foreach($products->get() as $prod)
<div class='p-4 rounded bg-blue-200 w-full flex items-start'>
    <img src={{$prod->imgUrl}} style='width: 100px; height: auto;' class='mr-4'>
    <div>
        <h3 class='text-2xl'>{{$prod->name}}</h3>
        <hr />
        <div class='italic text-gray-500'>
            {{$prod->description}}
        </div>
        <div class='text-4xl text-right text-green-600'>{{$prod->price}}</div>
    </div>
</div>
@endforeach

<div id="imgUrl_Error" hx-swap-oob='true'>

</div>
<div id="name_Error" hx-swap-oob='true'>

</div>
<div id="description_Error" hx-swap-oob='true'>

</div>
<div id="price_Error" hx-swap-oob='true'>

</div>

<div id='addMessage' hx-swap-oob='true'>
    <div class='bg-green-200 text-center text-green-800 p-3 rounded'>
        The Product has been added successfully.
    </div>
</div> 
