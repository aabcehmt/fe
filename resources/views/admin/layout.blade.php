<!DOCTYPE html>
<html lang="en">

	@include('admin.partials.header',['some' => 'Aabcehmt'])
	
	<body>
		
		@include('admin.partials.topbar')
		
		<!-- Esto es Anguar
		<div ng-app="">
			<p>Name : <input type="text" ng-model="name"></p>
			<h1>Hello @{{name}}</h1>
		</div>	
		-->
		
		<div class="container">
		
			<div class="row">
				<ol class="breadcrumb">
					<li><small><a href="/home">home</a></small></li>
					@yield('place')
				</ol>
			</div>

			<!-- <div class="page-header">
				<h5>Example page header <small>Subtext for header</small></h5>
			</div>-->

			@yield('content')

		</div><!-- /.container -->

		<!--<footer class="footer">
			<div class="container">
				<p class="text-muted">Place sticky footer content here.</p>
			</div>
		</footer> -->
		@include('admin.partials.scripts')
	</body>
</html>
