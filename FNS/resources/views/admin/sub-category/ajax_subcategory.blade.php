<option value="">Select Sub-category</option>
@foreach($subcategory as $value)
    <option value="{{ $value->id }}">{{ $value->sub_category_name }}</option>
@endforeach