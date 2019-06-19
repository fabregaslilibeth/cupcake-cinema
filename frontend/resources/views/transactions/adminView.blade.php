@extends('layouts.app')

@section('title')
bookings History
@endsection

@section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto admin-trx">
                

    <table class="table table-striped mx-auto text-center">
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
            </tr>
        </thead>
        <tbody id="bookings"></tbody>
    </table>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        fetch('https://vast-headland-67419.herokuapp.com/bookings/', {
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
                   </tr>
                ` 
            });
        })
        .catch(function(err) {
            console.log(err);
        });
    </script>

        
            

            
        
@endsection