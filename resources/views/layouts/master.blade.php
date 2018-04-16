@include('layouts.header')
@include('layouts.nav')
<div class="container">
	<div class="columns">
		<div class="column is-two-thirds">
			@yield('content')
		</div>
		<div class="column is-one-third is-hidden-mobile">
			@include('layouts.sidebar')
		</div>
	</div>
</div>
@include('layouts.footer')