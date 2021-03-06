@extends('welcome')
@section('content')

        <div class="container-fluid mx-auto">
            <div class="row">
               <div class="col-lg-12" id="home">
                   
               </div>
            </div>

            <div class="row" id="about">
                <div class="col-lg-8 mx-auto py-4" >
                    <div class="about-wrapper ">
                        <div class="row">
                            <div class="about-text-container">
                               <div class="headers">
                                    <h4>THIS IS US..</h4>
                                    <h1>about</h1>
                               </div>

                                <p class="about-text">They say that anyone can pick up a camera and start taking beautiful photographs, as long as the camera that they use is of utmost quality type. I tend to disagree. While there are natural born gifted photographers, many have to go through countless years of learning and hardship to achieve a remarkable standard in photography.
                                </p>
                            </div>

                            <div class="card about-image-container">
                                <div class="about-image"></div>
                            </div>
                        </div>

                    </div>
                 
                </div>
            </div> <!-- end of about row -->

            <div class="row my-4 py-4" id="testimonials">
                <h4 class="text-center mx-auto ">What our clients say about us</h4>
                <div class="col-lg-12" id="testimonials">
                    <!-- START CAROUSEL HERE -->
                    <div class="testi-wrapper mx-auto">
                   

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner" id="reviews">

                            <div class="carousel-item active">

                                <!-- <img src="/images/testi1.jpg"  alt=""> -->
                                <div class="testi-text-container">
                                    <h3 class="text-center">Beyond Grateful</h3>
                                    <p class="text-center">" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio praesentium id, magnam eius omnis itaque fugiat ipsam tempora laboriosam et debitis ipsum iste, qui repellat. Libero excepturi odit, dolore perspiciatis."</p>
                                    <p class="text-right px-4">photoG@graphics.com</p>
                                    <p class="text-right px-4">June 15th 2019, 6:10:15 pm</p>

                                </div>
                            </div>

                              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>


                          
                        </div>
                    </div>
                    <!-- END CAROUSEL HERE -->
                </div>
            </div>
            </div> <!-- end testi row -->

                    <hr>
            <div class="row my-4" id="investment">
                <div class="col-lg-12">
                    <h4 class="text-center py-4">PACKAGES</h4>

                    <div class="col-lg-6 text-center mx-auto">
                        <p>Peak Summer 2019 collections start at P50,000 and include at least 6 hours of continuous wedding photography, a collection of digital images and a shareable online gallery.</p>


                              <!--   <ul  id="packageList">
                                </ul> -->
                            <!-- will be dynamic up to here, 3 columns -->
                                   
                                 <table class="table table-striped mx-auto text-center">
                                        <thead >
                                            <tr>
                                                <th scope="col">Package</th>
                                                <th scope="col">Inclusions</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead >

                                        <tbody id="packageList">

                                        </tbody>
                                    </table>

                            <p>Additional files, albums and other products are available for purchase.</p>
                        <p>Additional sales tax is applicable to all sessions and products.</p>

                    </div>
                </div>
            </div> <!-- end of row-investments -->
    
    <hr>
            <div class="row my-4 py-4" id="contact">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-5 mx-auto">
                            <div class="form-wrapper p-4 col-lg-12">
                              <h2 class="contact-h2">contact</h2>
                              <p id="status"></p>
                                <form id="createContact" >
                            @csrf

                            <div class="form-group">
                                <label for="name1">Name: </label>
                                <input type="text" id="name1" class="form-control" name="name1" placeholder="Your Name">
                            </div>                            
                            <div class="form-group">
                                <label for="name2">Partner's Name: </label>
                                <input type="text" id="name2" class="form-control" name="name2" placeholder="Your Partner's Name">
                            </div>

                            <div class="form-group">
                                <label for="package_id">Preferred Package </label>
                                <select name="package_id"  id="package_id" class="packageOptions border-0 text-center form-control">
                                    <option value="">Your preferred package</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="wedding_date">Preferred Date</label>
                                <input type="date"  id="wedding_date" class="form-control" name="wedding_date" placeholder="Preferred Date">     
                                   <script>
                                        function pad(n) {
                                            return n<10 ? '0'+n : n;
                                        };

                                        let currentDate = new Date()
                                        let yyyy = currentDate.getFullYear();
                                        let mm = currentDate.getMonth();
                                        let dd = currentDate.getDate();

                                        let mindate = yyyy + "-" + pad(mm+1) + "-" + pad(dd);
                                        console.log(mindate)    

                                        const e = document.querySelector('#wedding_date').min=mindate
                                        console.log(e)

                                    </script>

                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile: </label>
                                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile">
                            </div>

                            <div class="form-group">
                                <label for="content">Message: </label>
                                <textarea id="message" rows="3" class="form-control" name="message" placeholder="Message"> </textarea> 
                            </div>

                            <button id="createReviewButton" onclick="createReview()" class="btn btn-outline-secondary btn-block" data-dismiss="modal"> Submit</button>
                        </form>

                            </div>
                        </div>
                     
                    </div>
                    
                </div>      
            </div> <!-- end of row for contact -->
<!-- 
            <div class="row" id="footer">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
               
                            
                        <div class="col-lg-12">
                            <div class="footer-links">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link nav-link-footer" href="#home">Home</a></li>
                                    <li class="nav-item"><a class="nav-link nav-link-footer" href="/blogsUser">Blogs</a></li>
                                    <li class="nav-item"><a class="nav-link nav-link-footer" href="#testimonials">Client Reviews</a></li>
                                    <li class="nav-item"><a class="nav-link nav-link-footer" href="#investment">Packages</a></li>
                                    <li class="nav-item"><a class="nav-link nav-link-footer" href="#contact">Contact</a></li>
                                </ul>
                             </div>   
                        </div>     

              
                    </div>
                </div>
            </div>  --><!-- end of footer row -->
                <div class="copyright col-lg-12">
                    <p class="text-center">CUPCAKE CINEMA || &copy; 2015</p>
                </div>

        </div> <!-- end of container for entire home -->

    

@endsection


<script type="text/javascript">

           fetch('https://vast-headland-67419.herokuapp.com/reviews/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            //console.log(data)
            let reviews = data.data.reviews;
            //console.log(reviews )
            reviews.forEach(function(review) {
                if (review.is_displayed == true)  {
                document.getElementById("reviews").innerHTML += `

                            <div class="carousel-item ">
                                <div class="testi-text-container">
                                    <h3 class="text-center">${review.title}</h3>
                                    <p class="text-center">"${review.message}"</p>
                                    <p class="text-right px-4">${review.ownerEmail}</p>
                                    <p class="text-right px-4">${review.date}</p>
                                </div>
                            </div>

                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>

                `}
            });

        })




           function createReview() {

            const formElement = document.getElementById('createContact');
            const formData = new FormData(formElement);
            console.log(formData)
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };

            //add user email to jsonObject
            jsonObject.email = localStorage.getItem('email');
            console.log(JSON.stringify(jsonObject));


             let reqHeader = new Headers();
            reqHeader.append('Access-Control-Request-Headers', 'Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization');
            reqHeader.append('Content-Type', 'application/json');
            reqHeader.append('Access-Control-Request-Method', 'POST');
            reqHeader.append('X-Requested-With', 'XMLHttpRequest');
            reqHeader.append('Authorization', 'Bearer ' + localStorage.getItem('token'));

            //create optional init object for supplying options to the fetch request
            let initObject = {
                method: 'POST', headers: reqHeader, body: JSON.stringify(jsonObject),
            };

            //create a resource request object through the Request() constructor
            let clientReq = new Request('https://vast-headland-67419.herokuapp.com/bookings/', initObject);

             console.log(clientReq)   
            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(data) {
                //console.log(response);
                document.querySelector('#status').classList = "alert-tagumpay";
                document.querySelector('#status').innerHTML = "Successfully booked.";
              // window.location.replace('/transactions/{id}')

            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
                document.querySelector('#status').classList = "alert-bigo";
                document.querySelector('#status').innerHTML = "Please log in first";
                window.location.replace('/users/login')
            });


        }

    

        fetch('https://vast-headland-67419.herokuapp.com/availabilities/').then(function(response) {
            return response.json();
        })
        .then(function(data) {

            const availabilities = data.availabilities;
            console.log(availabilities)
            let availGroups = " ";

            availabilities.map(availability =>  {
                availGroups += `
                             <tr>
                               <td>${availability.name} </td>
                               <td>${availability.description}</td>
                               <td> ${availability.price} </td>
                             </tr>
                         
                `
            })
            
            const availabilitiesSelect = data.availabilities;
            console.log(availabilitiesSelect)
            let availGroupsSelect = " ";

            availabilitiesSelect.map(availability =>  {
                availGroupsSelect += `
                               <option value="${availability.name}">${availability.name} </option>
                             
                `
            })
                document.getElementById("packageList").innerHTML += availGroups;
                document.querySelector(".packageOptions").innerHTML += availGroupsSelect;
             })   

            //turn the book-btn class into an array
            let buttons = document.querySelectorAll('.book-btn');

            //loop through the buttons array to add an event listener and associate specific product id to each one
            buttons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    if(localStorage.getItem('token')==null) {
                        window.location.replace("/users/login");
                    } else { 
                        window.location.replace(`/availabilities/${id}`);
                    }
                });
            })
         
        // .catch(function(err) {
        //     console.log(err);
        // });



    </script>

