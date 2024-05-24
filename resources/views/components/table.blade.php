<table {{ $attributes->merge(['class' => "table table-bordered text-nowrap border-bottom", 'id' => 'basic-datatable'])  }} >
    {{ $slot }}
</table>
