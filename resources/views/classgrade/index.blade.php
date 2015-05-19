@foreach($classgrades as $cg)
    <p>{{ $cg->grade }}年级 {{ $cg->class }}班</p>
@endforeach