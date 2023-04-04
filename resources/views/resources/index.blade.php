{{-- 7. I make the connection between partials/_main and here with @extends('template.index')
   and display the content in the right place with @section('content')

   11. I loop over information to make them all appear 

   12. I fill the information with the data from the DB
   Wordpress theme
    --}}

@extends('template.index')

@section('content')

    <a href="/resources/create" class="btn btn-primary" style="display: inline-block; margin: 1em">Add a resource</a>
    <section class="work">
        @foreach ($resources as $resource)
            <figure class="white">
                <a href="/resources/{{ $resource->id }}/{{ $resource->title }}">
                    <img src="{{ $resource->image ? asset('storage/' . $resource->image) : asset('/assets/img/no-image.jpeg') }}" alt="" />
                    <dl>
                        <dt>{{ $resource->title }}</dt>
                        <dd>
                            {{ $resource->description }}
                        </dd>
                    </dl>
                </a>
                <div id="wrapper-part-info">
                    <div class="part-info-image">
                        <img src="{{ asset('assets/img/' . $resource->categories->logo) }}" alt="" width="28"
                            height="28" />
                    </div>
                    <div id="part-info">{{ $resource->categories->name }}</div>
                </div>
            </figure>
        @endforeach
    </section>

    <div id="wrapper-oldnew">
        <div class="oldnew">
            <div class="wrapper-oldnew-prev">
                <div id="oldnew-prev"></div>
            </div>
        </div>
    </div>

@stop
