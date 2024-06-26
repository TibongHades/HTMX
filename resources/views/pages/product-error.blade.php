@include('pages.product-message', ['products'=>$products])

<div id="imgUrl_Error" hx-swap-oob="true">
    <div class="italic text-red-800 rounded">
        <ul class="ms-2">
            @if($errors->has('imgUrl'))
                <div class="error">{{ $errors->first('imgUrl') }}</div>
            @endif
        </ul>
    </div>
</div>
<div id="name_Error" hx-swap-oob="true">
    <div class="italic text-red-800 rounded">
        <ul class="ms-2">
            @if($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </ul>
    </div>
</div>
<div id="description_Error" hx-swap-oob="true">
    <div class="italic text-red-800 rounded">
        <ul class="ms-2">
            @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
            @endif
        </ul>
    </div>
</div>
<div id="price_Error" hx-swap-oob="true">
    <div class="italic text-red-800 rounded">
        <ul class="ms-2">
            @if($errors->has('price'))
                <div class="error">{{ $errors->first('price') }}</div>
            @endif
        </ul>
    </div>
</div>

<div id='addMessage' hx-swap-oob='true'>

</div> 
