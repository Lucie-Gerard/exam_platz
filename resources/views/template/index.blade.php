<!DOCTYPE html>
<html>

<head>
    @include('template.partials._head')
</head>

<body>
    @include('template.partials._header')

    @include('template.partials._nav')

    @include('template.partials._filter')

    <div id="wrapper-container">
        @include('template.partials._main')

        @include('template.partials._footer')
    </div>

    @include('template.partials._scripts')
</body>

</html>
