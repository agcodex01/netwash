
<x-test title="test title"></x-test>

@php
    $array = [
        [
            'name' => 'lorem',
            'position' => 1
        ],
        [
            'name' => 'niks',
            'position' => 1
        ]
    ]
@endphp

<script>
    var name = 'lorem'
    var app = @json($array);
    console.log(app);
</script>