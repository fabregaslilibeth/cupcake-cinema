      
            <a href="#" class=" h1 my-4 mx-auto text-center" >
               <h1 class="text-center py-4"> CUPCAKE CINEMA</h1>
                <!-- <img src="" height="22px" width="100px" > -->
            </a>

      <nav class="navbar nav navbar-expand-lg sticky-top mx-auto">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav">
			<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
		</button>

            <div id="navBar" class="navbar-nav " class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto menu">
				<li class="nav-item ">
                    <a href="#home" class="nav-link">Home</a>
                </li>
                <li class="nav-item ">
                    <a href="/gallery" class="nav-link">Portfolio</a>
                </li>
                <li class="nav-item ">
                    <a href="#testimonials" class="nav-link">Client Reviews</a>
                </li>                
                <li class="nav-item ">
                    <a href="#investment" class="nav-link">Events</a>
                </li>                
                <!-- <li class="nav-item ">
                    <a href="#calendar" class="nav-link">Calendar</a>
                </li> -->
                <li class="nav-item ">
				    <a href="#contact" class="nav-link">Contact</a>
				</li>
                <li class="nav-item " >
                <a href="/users/login" class="nav-link">Login</a>
                </li>
                <li class="nav-item " >
                <a href="/users/register" class="nav-link">Register</a>
                </li>
                 <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      NAME <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-link" href="/transactions/${localStorage.getItem('userId')}">My Bookings</a>
                        <a class="dropdown-item" href="">Reviews
                        </a>
                        <a class="dropdown-item" href="">Logout
                        </a>


                    </div>
                </li>   
			</ul>
		</div>
	</nav> <!-- end nav -->

