@props(['name' => '','display' => '' , 'era' => ''])

    <select name="{{ $name }}" onchange="" style="height: 35px;">
        <option class="dropdown-item" selected hidden value="">{{ $display }}</option>
        @foreach ($filter as $value)
            <option class="dropdown-item" value="{{ $value->id }}">{{ $value->{$era} }}</option>
        @endforeach
    </select>

