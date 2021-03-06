@extends('layouts.app')

@section('title')
Cupcake Cinema || My Bookings
@endsection

@section('content')


<div class="container-fluid">
    <h3 class="text-center">My Bookings</h3>
    <div class="row my-4">
        <div class="col-lg-9 mx-auto">

<p id="status"></p>
            
    <table class="table table-striped mx-auto">
        <thead>
            <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Couple 1</th>
                <th scope="col">Couple 2</th>
                <th scope="col">Package</th>
                <th scope="col">Wedding Date</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th> 
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="bookings"></tbody>
    </table>


        </div>
    </div>
</div>

    <script type="text/javascript">
        fetch('https://vast-headland-67419.herokuapp.com/bookings/{{$id}}', {
            method: "GET",
            headers: {
                "Content-Type" : "application/json",
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
        })
        .then(function(response) {
            return response.json();
           
        })
        .then(function(data) {
            console.log(data)
            let bookings = data.data.bookings;
            console.log(bookings)
            bookings.forEach(function(booking) {
                document.getElementById("bookings").innerHTML += `
                <tr>
                    <td>${booking._id}</td>
                    <td>${booking.name1}</td>
                    <td>${booking.name2}</td>
                    <td>${booking.package_id}</td>
                    <td>${booking.wedding_date}</td>
                    <td>${booking.mobile}</td>
                    <td>${booking.ownerEmail}</td>
                    <td>${booking.status}</td>
                    <td>
                        <div class="btn-container">
                            <button class="btn del-btn" id="${booking._id}"><i class="fas fa-trash-alt"></i></button>
                            <button class="btn editButton" id="${booking._id}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i>
                                    </button>
                        </div>
                     </td>
                </tr>
                `
                // if(booking.status == "cancelled") {
                //     document.getElementById(booking._id).disabled = true;
                // } else {
                //     document.getElementById(booking._id).disabled = false;
                // }
            });  


              //turn the del-btn class into an array
            let editButtons = document.querySelectorAll('.editButton');

            //loop through the delButtons array to add an event listener and associate specific product id to each one
              editButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    window.location.replace(`/bookings/showEdit/${id}`);
                });
            })

            //turn the del-btn class into an array
            let delButtons = document.querySelectorAll('.del-btn');

            //loop through the delButtons array to add an event listener and associate specific product id to each one
            delButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    if(!confirm('Are you sure you want to delete?')) {
                        return false
                    }
                    let id = this.getAttribute('id');
                    console.log(id)
                     fetch('https://vast-headland-67419.herokuapp.com/bookings/delete', {
                        'method' : 'delete',
                        'headers' : {
                                     "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                                 "Content-Type": "application/json",
                                 "Access-Control-Request-Method": "POST",
                                 "X-Requested-With": "XMLHttpRequest",
                                 "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                      body : JSON.stringify({'id' : id})

                    })  (document.location.reload()) 
                           
                  }) 
            });
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>

        
            

            
        
@endsection