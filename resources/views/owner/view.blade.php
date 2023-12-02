<h1>{{ $owner->name }}'s Properties</h1>
<ul>
    @foreach ($owner->properties as $property)
    <li>{{ $property->address }} - ({{ $property->type }})</li>
    @endforeach
</ul>