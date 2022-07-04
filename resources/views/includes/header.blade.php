<!-- Header -->
<div class="header">
			
	<!-- Logo -->
	<div class="header-left">
		<a href="{{route('dashboard')}}" class="logo">
			{{-- <img src="@if(!empty(AppSettings::get('logo'))) {{asset('storage/'.AppSettings::get('logo'))}} @else{{asset('assets/img/logo.png')}} @endif" alt="Logo"> --}}
		</a>
		<a href="{{route('dashboard')}}" class="logo logo-small">
			<img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
		</a>
	</div>
	<!-- /Logo -->
	
	<a href="javascript:void(0);" id="toggle_btn">
		<i class="fe fe-text-align-left"></i>
	</a>
	
	
	
	<!-- Mobile Menu Toggle -->
	<a class="mobile_btn" id="mobile_btn">
		<i class="fa fa-bars"></i>
	</a>
	<!-- /Mobile Menu Toggle -->
	
	<!-- Header Right Menu -->
	<ul class="nav user-menu">

		<!-- Notifications -->
		<li class="nav-item dropdown noti-dropdown">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<i class="fe fe-bell"></i> <span class="badge badge-pill">{{auth()->user()->unReadNotifications->count()}}</span>
			</a>
			<div class="dropdown-menu notifications">
				<div class="topnav-dropdown-header">
					<span class="notification-title">Notifications</span>
					<a href="{{route('mark-as-read')}}" class="clear-noti">Mark All As Read </a>
				</div>
				<div class="noti-content">
					<ul class="notification-list">
						@foreach (auth()->user()->unReadNotifications as $notification)
							<li class="notification-message">
								<a href="{{route('read')}}">
									<div class="media">
										<span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="Product image" src="{{asset('storage/purchases/'.$notification['image'])}}">
										</span>
										<div class="media-body">
											<h6 class="text-danger">Stock Alert</h6>
											<p class="noti-details">
												<span class="noti-title">{{$notification->data['product_name']}} is only {{$notification->data['quantity']}} left.</span>
												<span>Please update the purchase quantity </span>
											</p>
											
											<p class="noti-time"><span class="notification-time">{{$notification->created_at->diffForHumans()}}</span></p>
										</div>
									</div>
								</a>
							</li>
						@endforeach						
					</ul>
				</div>
				<div class="topnav-dropdown-footer">
					<a href="#">View all Notifications</a>
				</div>
			</div>
		</li>
		<!-- /Notifications -->
		
		<!-- User Menu -->
		<li class="nav-item dropdown has-arrow">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img class="rounded-circle" src="@if(!empty(auth()->user()->avatar)){{asset('storage/users/'.auth()->user()->avatar)}}@endif" width="31" alt="avatar"></span>
			</a>
			<div class="dropdown-menu">
				<div class="user-header">
					<div class="avatar avatar-sm">
						<img src="@if(!empty(auth()->user()->avatar)){{asset('storage/users/'.auth()->user()->avatar)}}@endif" alt="User Image" class="avatar-img rounded-circle">
					</div>
					<div class="user-text">
						<h6>{{auth()->user()->name}}</h6>
					</div>
				</div>
				
				<a class="dropdown-item" href="{{route('profile')}}">My Profile</a>
				@can('view-settings')<a class="dropdown-item" href="{{route('settings')}}">Settings</a>@endcan
				@can('backup-app')
				<a class="dropdown-item" href="{{route('backup-app')}}">Backup App</a>
				@endcan
				@can('backup-db')
				<a class="dropdown-item" href="{{route('backup-db')}}">Backup Database</a>
				@endcan
				<a class="dropdown-item" href="{{route('logout')}}">Logout</a>
			</div>
		</li>
		<!-- /User Menu -->
		
	</ul>
	<!-- /Header Right Menu -->
	
</div>
<!-- /Header -->