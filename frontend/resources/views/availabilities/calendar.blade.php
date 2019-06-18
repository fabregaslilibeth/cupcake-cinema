@extends('layouts.app')

@section('title')
Cupcake Cinema || My Bookings
@endsection

@section('content')


<div class="container-fluid">
    <h3 class="text-center">Calendar of Bookings</h3>
    <div class="row my-4">
        <div class="col-lg-5 mx-auto">

<div id='calendar'></div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
  fetch('http://localhost:3000/bookings/', {
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
            
            let bookings = data.data.bookings;
            bookings.map(booking => {   
            //  bookings.forEach(function(booking) {

              
                    $(document).ready(function() {
                        // page is now ready, initialize the calendar...
                        $('#calendar').fullCalendar({
                            // put your options and callbacks here

                           events: [

                                {
                                    title  : `${booking.name1}`,
                                    start  : `${booking.wedding_date}`,
                                    end    : `${booking.wedding_date}`,
                                    id     : `${booking._id}`,
                                    allDay: false
                                }
                                
                                ]
                            })
                   });
            });
        })
        .catch(function(err) {
            console.log(err);
        });





</script>

<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>
            
        
@endsection