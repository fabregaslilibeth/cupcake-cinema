//toggle navbar to reflect different options depending on logged in user
function checkUser() {
			let isAdmin = localStorage.getItem('isAdmin');
			if(isAdmin == "true") {
				document.getElementById("navBar").innerHTML = `
				
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
					  <ul class="navbar-nav mx-auto menu">
							
							<li class="nav-item ">
							<a href="/blogs" class="nav-link">Blogs</a>
							</li>
							<li class="nav-item ">
							<a href="/reviews" class="nav-link">Client Reviews</a>
							</li>                
							<li class="nav-item ">
							<a href="/packages" class="nav-link">Packages</a>
							</li>                
					        <li class="nav-item">
						        <a class="nav-link" href="/calendar">Calendar</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="/admin/transactions">Transactions</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="#" id="logout">Logout</a>
					        </li>    
					    </ul>
				    </div>
				`
			} else if(isAdmin == "false") {
				document.getElementById("navBar").innerHTML = `
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav mx-auto menu">

							<li class="nav-item ">
					            <a href="/" class="nav-link">Home</a>
					        </li>
					        <li class="nav-item ">
					            <a href="/blogsUser" class="nav-link">Blogs</a>
					        </li>
					        <li class="nav-item ">
					            <a href="/#testimonials" class="nav-link">Client Reviews</a>
					        </li>                
					        <li class="nav-item ">
					            <a href="/#investment" class="nav-link">Events</a>
					        </li>                
					        <!-- <li class="nav-item ">
					            <a href="/#calendar" class="nav-link">Calendar</a>
					        </li> -->
					        <li class="nav-item ">
							    <a href="/#contact" class="nav-link">Contact</a>
							</li>
					         <li class="nav-item dropdown">
					            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					              ${localStorage.getItem('email')}<span class="caret"></span>
					            </a>

					            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					                <a class="dropdown-item" href="/transactions/${localStorage.getItem('userId')}">My Bookings
					                </a>
					                <a class="dropdown-item" href="/reviews/${localStorage.getItem('userId')}">My Reviews
					                </a>
					                <a class="dropdown-item" href="#" id="logout">Logout
					                </a>


					            </div>
					        </li>   
					      
					    </ul>
				    </div>
				`
			} else {
				document.getElementById("navBar").innerHTML = `
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav mx-auto menu">
						<li class="nav-item ">
                    <a href="/" class="nav-link">Home</a>
		                </li>
		                <li class="nav-item ">
		                    <a href="/blogsUser" class="nav-link">Blogs</a>
		                </li>
		                <li class="nav-item ">
		                    <a href="/#testimonials" class="nav-link">Client Reviews</a>
		                </li>                
		                <li class="nav-item ">
		                    <a href="/#investment" class="nav-link">Events</a>
		                </li>                
		                <li class="nav-item ">
		                    <a href="/#calendar" class="nav-link">Calendar</a>
		                </li>
		                <li class="nav-item ">
						    <a href="/#contact" class="nav-link">Contact</a>
						</li>
		                <li class="nav-item " >
		                <a href="/users/login" class="nav-link">Login</a>
		                </li>
		                <li class="nav-item " >
		                <a href="/users/register" class="nav-link">Register</a>
		                </li>
                    
					    </ul>
				    </div>
				`
			}
		};

checkUser();

function logout() {

	fetch('http://localhost:3000/auth/logout', {
            method: "GET",
            headers: {
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
        })
		.then(function(response) {
            return response.json();
        })
        .then(function(data) {
            localStorage.clear();
            window.location.replace("/");
        })
        .catch(function(err) {
            console.log(err);
        });
};

//if logout button exists, assign an onclick event for logging out
let logoutButton = document.getElementById("logout");
if(logoutButton) {
	logoutButton.addEventListener("click", logout);
}

