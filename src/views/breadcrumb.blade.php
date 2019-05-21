@if(isset($breads))
	
	<ul>

      @foreach($breads as $bread)

			@if($bread['url'] === '')
				<li>/ {!! $bread['label'] !!}</li>
			@else
				
				<li><a href="{!! $bread['url'] !!}">{!! $bread['label'] !!}</a></li>
			@endif

		@endforeach

    </ul>

@endif