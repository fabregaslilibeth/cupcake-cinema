@extends('layouts.app')

@section('title')
Cupcake Cinema || Admin Calendar
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 mx-auto ">
            

    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th scope="col">Wedding Date</th>
                <th scope="col">Booked by</th>
                <th scope="col">Package</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody id="bookings">
            
        </tbody>
    </table>

        </div>
    </div>
</div>

    <script type="text/javascript">

        fetch('http://localhost:3000/reviews/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            console.log(data)
            let reviews = data.data.reviews;
            console.log(reviews )
            reviews.forEach(function(review) {
                document.getElementById("reviews").innerHTML += `
                <tr>
                    <td>${review._id}</td>
                    <td>${review.ownerEmail}</td>
                    <td>${review.title}</td>
                    <td>${review.message}</td>
                    <td>${review.date}</td>
                    <td>${review.is_displayed}</td>
                    <td>
                        <button class="btn btn-success del-btn" id="${review._id}">Display</button>
                    </td>
                </tr>
                `
            });

            //turn the del-btn class into an array
            let delButtons = document.querySelectorAll('.del-btn');

      
            //loop through the delButtons array to add an event listener and associate specific product id to each one
            delButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    fetch(`http://localhost:3000/reviews/${id}`, {
                        method: 'PUT', 
                        headers: {
                            "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                            "Content-Type": "application/json",
                            "Access-Control-Request-Method": "PUT",
                            "X-Requested-With": "XMLHttpRequest",
                            "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                        //instead of deleting reviews, disable them
                        body: JSON.stringify({
                            "is_displayed": true
                        }),
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        window.alert(data.data.message);
                    })
                    .catch(function(err) {
                        console.log("Something went wrong!", err);
                    });
                });
            });
            //loop through the actButtons array to add an event listener and associate specific product id to each one
            actButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    fetch(`http://localhost:3000/reviews/${id}`, {
                        method: 'PUT', 
                        headers: {
                            "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                            "Content-Type": "application/json",
                            "Access-Control-Request-Method": "PUT",
                            "X-Requested-With": "XMLHttpRequest",
                            "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                        //instead of deleting reviews, disable them
                        body: JSON.stringify({
                            "isActive": true
                        }),
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        window.alert(data.data.message);
                    })
                    .catch(function(err) {
                        console.log("Something went wrong!", err);
                    });
                });
            });
        })
        .catch(function(err) {
            console.log(err);
        });

        function submit() {
            //select the form element
            const formElement = document.getElementById('addItem');
            //using FormData, the form input names and their corresponding values will be transformed to JSON format
            const formData = new FormData(formElement);
            //iterate through the formData and save each key-value pair to JSON
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            console.log(jsonObject);

            //store all headers into a single variable
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
            let clientReq = new Request('http://localhost:3000/reviews', initObject);

            //pass the request object as an argument for our fetch request
            fetch(clientReq)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    console.log(JSON.stringify(data));
                    document.getElementById('status').innerHTML = JSON.stringify(data.data.message);
                })
                .catch(function(err) {
                    console.log("Something went wrong!", err);
                });
        };
    </script>

        
            

            
        
@endsection