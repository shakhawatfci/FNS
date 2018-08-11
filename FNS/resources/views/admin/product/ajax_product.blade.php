<option value="">All Product</option>

@foreach($product as $value)
<option value="{{ $value->id }}">{{ $value->product_name }} - {{ $value->product_code }}</option>

@endforeach