     <option value="">Select Category</option>
                        @foreach($category as $value)
                         <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                        @endforeach