<h1>{{ $owner->name }}'s {{$owner->properties->count() > 1 ? 'Properties' : 'Property'}} </h1>
@if ($owner->properties->count() > 0)
<ul>
    @foreach ($owner->properties as $property)
    <li>{{ $property->address }} - ({{ $property->type }})</li>
    @endforeach
</ul>
@else
    <h3>No properties available</h3>
@endif