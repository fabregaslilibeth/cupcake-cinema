@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')
<div class="container-fluid ">
    <div class="row">
  
        <div class="col-lg-10 admin-trx mx-auto">
            <h3 class="text-center">Packages</h3>

        <a href="/addPackage" class="btn btn-outline-secondary m-4">Add New Package</a>
            <table class="table table-striped mx-auto ">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>

                <tbody id="availabilities">
                    
                </tbody>
            </table>

        </div>


    </div>
</div>


    <script type="text/javascript">

        fetch('https://vast-headland-67419.herokuapp.com/availabilities/').then(function(response) {
            return response.json();
        })
        .then(function(data) {
            let availabilities = data.availabilities;
            availabilities.forEach(function(availability) {
                document.getElementById("availabilities").innerHTML += `
                <tr>
                    <td>${availability.name}</td>
                    <td>${availability.description}</td>
                    <td>${availability.price}</td>
                    <td>
                        <div class="btn-container">
                            <button class="btn upd-btn" id="${availability._id}"><i class="fas fa-edit"></i></button>
                            <button class="btn del-btn" id="${availability._id}"><i class="fas fa-trash-alt"></i></button>
                        </div>    
                    </td>
                </tr>
                `
            });

            //turn the upd-btn class into an array
            let updButtons = document.querySelectorAll('.upd-btn');

            //turn the del-btn class into an array
            let delButtons = document.querySelectorAll('.del-btn');

            //turn the act-btn class into an array
            let actButtons = document.querySelectorAll('.act-btn');

            //loop through the updButtons array to add an event listener and associate specific product id to each one
            updButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    window.location.replace(`/availabilities/update/${id}`);
                });
            })
            //loop through the delButtons array to add an event listener and associate specific product id to each one
            delButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                      if(!confirm('Are you sure you want to delete this package?')) {
                        return false
                    }
                    let id = this.getAttribute('id')


                    console.log(id)
                        fetch('https://vast-headland-67419.herokuapp.com/availabilities/delete', {
                            'method' : 'delete',
                            'headers' : {
                                'Content-Type' : 'application/json'
                            },
                            body : JSON.stringify({'id' : id})

                        })      .then(res=> {
                        window.location ='/packages' })                   


                });  
            });
            //loop through the actButtons array to add an event listener and associate specific product id to each one
            actButtons.forEach(function(button) {
                //add onclick event listener to every button
                button.addEventListener('click', function() {
                    let id = this.getAttribute('id')
                    fetch(`https://vast-headland-67419.herokuapp.com/availabilities/${id}`, {
                        method: 'PUT', 
                        headers: {
                            "Access-Control-Request-Headers": "Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization",
                            "Content-Type": "application/json",
                            "Access-Control-Request-Method": "PUT",
                            "X-Requested-With": "XMLHttpRequest",
                            "Authorization": "Bearer " + localStorage.getItem('token')
                        },
                        //instead of deleting availabilities, disable them
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

    </script>

        
            

            
        
@endsection