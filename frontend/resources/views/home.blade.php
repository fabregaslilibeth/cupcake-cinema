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
                            <div class="about-text-container col-lg-6 col-md-12 col-sm-12">
                               <div class="headers">
                                    <h4>So this is us..</h4>
                                    <h1>about</h1>
                               </div>
                                <p class="about-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni illo tempore iste magnam, ut non mollitia itaque! Repellendus eius minus quae officiis qui repudiandae blanditiis libero, officia sequi beatae eaque.</p>
                            </div>

                            <div class="card about-image-container col-lg-6 mx-auto">
                                <div class="about-image mx-auto">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- <div class="team-wrapper my-4">
                            <h1 class="text-center py-4 ">Awards</h1>
                           <div class="team-photo-wrapper">
                                <div class="team-indiv-photo col-sm-6">
                                </div>
                                <div class="team-indiv-photo col-sm-6">
                                </div>
                                <div class="team-indiv-photo col-sm-6">
                                </div>      
                                <div class="team-indiv-photo col-sm-6">
                                </div>
                           </div>
                    </div> -->
                </div>
            </div> <!-- end of about row -->

            <div class="row" id="testimonials">
                <h1 class="text-center mx-auto ">What our clients say about us</h1>
                <div class="col-lg-12" id="testimonials">
                    <!-- START CAROUSEL HERE -->
                    <div class="testi-wrapper mx-auto">
                   

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner" id="reviews">

                            <div class="carousel-item active">
                                <!-- <img src="/images/testi1.jpg"  alt=""> -->
                                <div class="testi-text-container">
                                    <h3 class="text-center">Beyond Grateful</h3>
                                    <p class="text-center">" I am a mother of two, but I don't want to be 'JUST A MOTHER'. So I enrolled in Cupcake Cinema Photography Class and I can completely say it has changed my life forever."</p>
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
                    <h1 class="text-center py-4">PACKAGES</h1>

                    <div class="col-lg-6 text-center mx-auto">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit at voluptatem recusandae laboriosam dolorum aliquam voluptas ab hic. Voluptas nihil consectetur dolore reprehenderit magni cumque nesciunt quas repudiandae illum labore.</p>


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
                        <div class="col-lg-6">
                            <div class="form-wrapper col-lg-9 ml-auto">
                                <form id="createContact" class="py-4 my-4">
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
                                <input type="date" id="wedding_date" class="form-control"  name="wedding_date" placeholder="Preferred Date">        
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile: </label>
                                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Your Partner's Name">
                            </div>

                            <div class="form-group">
                                <label for="content">Message: </label>
                                <textarea id="message" rows="5" class="form-control" name="message" placeholder="Message"> </textarea> 
                            </div>

                        </form>
                            <button id="createReviewButton" onclick="createReview()" class="btn btn-secondary btn-block" data-dismiss="modal"> Submit</button>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-headers mr-auto col-lg-8 text-center">
                                <h2 class="get-in-touch">book now</h2>
                                <h2 class="contact-h2">contact</h2>
                           </div>
                        </div>
                    </div>
                    
                </div>      
            </div> <!-- end of row for contact -->

            <div class="row" id="footer">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                <div class="col-lg-3">
                    <div class="footer-wrapper">
                        <p>Cupcake Cinema</p>
                        <p>Why buy a whole cake if you can have the same gratification thru cupcake? </p>
                    </div>                
                </div>
                    
                <div class="col-lg-3">
                    <div class="footer-links">
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="">Gallery</a></li>
                            <li><a href="#testimonials">Client Reviews</a></li>
                            <li><a href="#investment">Investment</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                     </div>   
                </div>     

                <div class="col-lg-3">
                    <div class="footer-contact">
                        <p>24 Block D. Taft Avenue, Manila</p>
                        <p>info@cupcakecinema.com</p>
                        <p>857-2140</p>
                    </div>
                </div>                
                <div class="col-lg-3">
                    <div class="footer-newsletter">
                        Be updated with our promos and upcoming events.
                        <form action="">
                            <input type="email" placeholder="Your Email Address" required="">
                            <button>Subscribe now</button>
                        </form>
                    </div>
                </div>
                    
                </div>
                </div>
                </div>
            </div> <!-- end of footer row -->
                <div class="copyright col-lg-12">
                    <p class="text-center">CUPCAKE CINEMA || &copy; 2015</p>
                </div>

        </div> <!-- end of container for entire home -->

    

@endsection


<script type="text/javascript">

           fetch('http://localhost:3000/reviews/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            //console.log(data)
            let reviews = data.data.reviews;
            //console.log(reviews )
            reviews.forEach(function(review) {
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

                `
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
            let clientReq = new Request('http://localhost:3000/bookings/', initObject);

             console.log(clientReq)   
            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });


        }

    

        fetch('http://localhost:3000/availabilities/').then(function(response) {
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

