<!-- NAVBAR -->

{{-- 22. I loop on categories to make them appear one by one 
    I have to see where to use 21--}}
<div id="wrapper-navbar">
    <div class="navbar object">
        <div id="wrapper-bouton-icon">
            @foreach ($categories as $category)
                <div id="bouton-ai">
                    {{-- 23a. I add "<a> tag" for the category filter  --}}
                    <a href="/?category={{$category->name}}">
                        <img src="{{ asset('assets/img/' . $category->logo) }}" alt="{{ $category->name }}"
                        title="{{ $category->name }}" height="28" width="28" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
