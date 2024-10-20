@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    <ul>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
                @if($category->children)
                    <ul>
                        @foreach($category->children as $child)
                            <li>
                                {{ $child->name }}
                                @if($child->children)
                                    <ul>
                                        @foreach($child->children as $subchild)
                                            <li>{{ $subchild->name }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
