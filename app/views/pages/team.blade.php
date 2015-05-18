@extends('layouts.master')

@section('title')
Meet Our Team
@stop
	
@section('content')
	
	<div class="col-md-9">

		<div class="row">
		
			<h3 class="page-header col-md-12">Principals</h3>
			<div class="col-md-6 team-member">
				<img src="{{ URL::asset('library/img/team-parkin.jpg') }}" alt="" />
				<h4>DAVID PARKIN, P.E.</h4>
				<p><em>Principal Engineering<br />
Texas A&M University - Master of Engineering - 1986<br />
Oregon State University - Bachelor of Engineering - 1984</em></p>
				<p>David offers 30 years of experience in structural engineering, construction administration, and technical writing.</p>
<p>Along with his leadership, David oversees client communication, quality assurance and team management.</p>
<p>David is licensed to practice engineering in over 20 states and has managed hundreds of projects throughout the country.</p>
				</p>
			</div>
			
			<div class="col-md-6 team-member">
				<img src="{{ URL::asset('library/img/team-olsen.jpg') }}" alt="" />
				<h4>CHAD OLSEN</h4>
				<p><em>Principal Production<br />
NEC Technical College - Associate of Science - 1989</em></p>
				<p>Chad leads our production team and offers 25 years of experience in structural design, contract documents and IT management.</p> 

<p>In addition to project management, Chad administers overall project scheduling and oversees office standards.</p>
			</div>
			
			
			<h3 class="page-header col-md-12">Associates</h3>
			
			<div class="col-md-6 team-member">
				<img src="{{ URL::asset('library/img/team-cole.jpg') }}" alt="" />
				<h4>NATHAN COLE, P.E.</h4>
				<p><em>Associate, Project Manager<br />
University of Oklahoma - Bachelor of Engineering - 2007</em></p>
				<p>Nathan joined us in 2007.</p>  

<p>His project management experience includes engineering and construction administration on commercial, multi-family, urban mixed-use and senior living projects.</p>  

<p>His talents in construction administration are founded on communication and the relationships he develops with the architect and builder.</p>

<p>As a team leader, Nathan is instrumental in recruiting and mentoring an E.I.T. team.</p>
			</div>
			
			<div class="col-md-6 team-member">
				<img src="{{ URL::asset('library/img/team-anderson.jpg') }}" alt="" />
				<h4>SEAN ANDERSON, P.E.</h4>
				<p><em>Associate, Project Manager<br />
Southern Methodist University - Master of Engineering - 2006<br />
Texas Tech University - Bachelor of Engineering - 2004</em></p>
				<p>Sean joined us in 2008.</p>

<p>His project management experience includes a large variety of project types including commercial, multi-family, urban mixed-use and senior living projects.</p>

<p>Sean keeps our team current and up to date with the latest engineering analysis tools available.</p>

<p>As a team leader, Sean is instrumental in recruiting and mentoring an E.I.T. team.</p>
			</div>
			
			<h3 class="page-header col-md-12">Team</h3>	
			
			<div class="col-md-6 team-member">
				<img src="{{ URL::asset('library/img/team-titus.jpg') }}" alt="" />
				<h4>NEAL TITUS</h4>
				<p><em>Senior Production Manager<br />
Eastfield Junior College - Associate of Science - 2000</em></p>
				<p>Neal joined us in 2004.</p>

<p>He is a valued resource for construction document graphic standards and related topics.  His experience assures that our construction drawings meet the needs of each project.</p>

<p>Neal is instrumental in maintaining and further developing company AutoCAD and REVIT standards.</p>
			</div>
			
			<div class="col-md-6 team-member">
				<h4>Adam Phelps, E.I.T</h4>
				<p style="padding-bottom:25px;"><em>Design Engineer</em></p>
				
				<h4>Conrad Lovejoy, E.I.T</h4>
				<p style="padding-bottom:25px;"><em>Design Engineer</em></p>
				
				<h4>Jeremy Zaluski, E.I.T</h4>
				<p style="padding-bottom:25px;"><em>Design Engineer</em></p>
				
				<h4>Andrew Hollien</h4>
				<p style="padding-bottom:25px;"><em>Production</em></p>
				
				<h4>Ben Magana</h4>
				<p style="padding-bottom:25px;"><em>Production</em></p>
				
				<h4>Pam Cashion</h4>
				<p style="padding-bottom:25px;"><em>Accounting</em></p>

			</div>
		
		</div>
	
	</div>
	
@stop

@section('script')

@stop