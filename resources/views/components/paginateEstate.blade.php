@props(['variable' =>''])

@if (request()->has('city') || request()->has('type') || request()->has('min') || request()->has('max'))
    {{ $variable->appends([
            'city' => request('city'),
            'type' => request('type'),
            'min' => request('min'),
            'max' => request('max'),
        ])->links() }}
@else
    {{ $variable->links() }}
@endif
