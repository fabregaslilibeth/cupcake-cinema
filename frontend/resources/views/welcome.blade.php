@extends('layouts.app')

@section('title')
Cupcake Cinema
@endsection

   <!--  <script type="text/javascript">
        fetch('http://localhost:3000/availabilities/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            let availabilities = data.availabilities;
            availabilities.forEach(function(availability) {
                document.getElementById("products").innerHTML += `
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3" id="itemholder">
                        <div class="card">
                            <img class="card-img-top" src="http://lorempixel.com/400/200/sports" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">${availability.name}</h4>
                                <p class="card-text">${availability.description}</p>
                                <p class="card-text">Available seats: ${availability.seats}</p>
                                <p class="card-text">Price per seat: PhP ${availability.price}</p>
                                <button class="btn btn-primary book-btn" id="${availability._id}">Book now!</button>
                                <div>
                            </div>
                        </div>
                    </div>
                `
                if(availability.isActive == false) {
                    document.getElementById(availability._id).disabled = true;
                    document.getElementById(availability._id).innerHTML = "Unavailable";
                } else {
                    document.getElementById(availability._id).disabled = false;
                }
            });

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
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>

        
         -->    

        