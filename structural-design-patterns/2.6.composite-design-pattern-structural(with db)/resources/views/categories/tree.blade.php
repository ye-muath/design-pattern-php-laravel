
        <!-- resources/views/categories/tree.blade.php -->
            <ul>
                @foreach ($categories as $category)
                    <li>
                        {{ $category->name }}
                        @if ($category->children->isNotEmpty())
                            @include('categories.tree', ['categories' => $category->children])
                        @endif
                    </li>
                @endforeach
            </ul>

