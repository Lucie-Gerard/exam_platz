{{-- 32. I create a page to be able to add a resource 
    with all fields needed --}}

@extends('template.index')

@section('content')

    <div class="post-send">
        <div id="main-post-send">
            <div id="title-post-send">Add your resource</div>
            <form name="resources" method="POST" action="/resources" enctype="multipart/form-data">
                {{-- To avoid bad people's insert in the form : --}}
                @csrf
                <fieldset>
                    <div>
                        <input type="text" name="title" id="title" class="form-control"
                            placeholder="Enter your title here" value="{{old('title')}}" />

                        @error('title')
                            <p class="error_message_field">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <select id="user" name="user_id" class="form-control">
                            <option disabled selected>Select your name</option>

                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('user_id')
                            <p class="error_message_field">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <select id="category" name="category_id" class="form-control">
                            <option disabled selected>Select the category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="error_message_field">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p>
                            <textarea id="description" name="description" maxlength="500" placeholder="Your description" tabindex="5"
                                cols="30" rows="4">{{old('description')}}</textarea>
                        </p>
                        @error('description')
                            <p class="error_message_field">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="file" class="form-control-file btn btn-primary" id="image"
                            name="image" />

                        @error('image')
                            <p class="error_message_field">{{ $message }}</p>
                        @enderror
                    </div>

                </fieldset>
                <div style="text-align: center">
                    <input type="submit" name="envoi" value="Envoyer" />
                </div>
            </form>
        </div>
    </div>

    {{-- SIZE !! --}}

@stop
