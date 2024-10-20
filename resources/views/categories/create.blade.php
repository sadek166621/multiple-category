@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="parent_id">Parent Category (optional)</label>
            <select name="parent_id" class="form-control">
                <option value="">Select Parent Category</option>
                @foreach($categories as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                    @if($parent->children)
                        @foreach($parent->children as $child)
                            <option value="{{ $child->id }}">-- {{ $child->name }}</option>
                            @if($child->children)
                                @foreach($child->children as $subchild)
                                    <option value="{{ $subchild->id }}">---- {{ $subchild->name }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
@endsection
