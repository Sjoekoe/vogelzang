<div class="nav">
	<div class="container">
		<ul class="pull-left">
			<li> <a href=" {{ URL::route('home') }}">Home</a> </li>
			<li> <a href=" {{ URL::route('home.about') }} ">Over ons</a> </li>
			<li> <a href=" {{ URL::route('items.index') }} ">Nieuws</a> </li>
			<li> <a href=" {{ URL::route('horses.index') }} ">Te koop</a> </li>
			<li> <a href=" {{ URL::route('home.accomodation') }} ">Accomodatie</a> </li>
			<li> <a href=" {{ URL::route('home.manege') }} ">Manege</a> </li>
			<li> <a href=" {{ URL::route('contacts.create') }} ">Contact</a> </li>
		</ul>
		<ul class="pull-right">
			@if (Auth::check())
				@if (Auth::user()->level_id > 1)
					<li> <a href=" {{ URL::route('admin.index') }} ">Admin panel</a> </li>
				@endif
				@if (Auth::user()->level_id = 1)
                    <li>
                        <a href="{{ route('dashboard.index') }}">User Panel</a>
                    </li>
                @endif
				<li> <a href=" {{ URL::route('user.sign-out') }} ">Log uit</a> </li>

			@else
				<li> <a href=" {{ URL::route('user.sign-in') }} ">Leden</a> </li>
			@endif
		</ul>
	</div> <!-- End container -->
</div> <!-- End Nav -->
