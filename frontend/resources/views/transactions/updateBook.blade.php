@extends('layouts.app')

@section('title')
Cupcake Cinema || My Bookings
@endsection

@section('content')


<div class="container-fluid">
    <h3 class="text-center">My Bookings</h3>
    <div class="row my-4">
        <div class="col-lg-9 mx-auto">

<div class="row my-4 py-4" id="contact">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 mx-auto" >
                            <div class="form-wrapper p-4 col-lg-12">
                                <p id="status"></p>
                                <form id="editContact">
                            @csrf

                            <div class="form-group">
                                <label for="name1">Name: </label>
                                <input type="text" id="name1" class="form-control" name="name1" value="Your Name">
                            </div>                            
                            <div class="form-group">
                                <label for="name2">Partner's Name: </label>
                                <input type="text" id="name2" class="form-control" name="name2" value="Your Partner's Name">
                            </div>

                            <div class="form-group">
                                <label for="package_id">Preferred Package </label>
                                <select name="package_id"  id="package_id" class="packageOptions border-0 text-center form-control">
                                    <option value="">Your preferred package</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="wedding_date">Preferred Date</label>
                                <input type="date"  id="wedding_date" class="form-control" name="wedding_date" value="Preferred Date">        
                            </div>
                            
                            <div class="form-group">
                                <label for="mobile">Mobile: </label>
                                <input type="text" id="mobile" class="form-control" name="mobile" value="Your Partner's Name">
                            </div>

                            <div class="form-group">
                                <label for="content">Message: </label>
                                <textarea id="message" rows="3" class="form-control" name="message" value="Message"> </textarea> 
                            </div>

                        </form>
                            <button id="createReviewButton" onclick="editContact()" class="btn btn-outline-secondary btn-block" data-dismiss="modal"> Submit</button>

                            </div>
                        </div>
                       
                    </div>
                    
                </div>      
            </div> <!-- end of row for contact -->


        </div>
    </div>
</div>

    <script type="text/javascript">
       fetch('http://localhost:3000/bookings/showEdit/{{$id}}', {
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
            //dynamically fill in product info from API's response
            //console.log(data.availability.name);
            document.getElementById("name1").value = data.booking.name1;
            document.getElementById("name2").value = data.booking.name2;
            document.getElementById("package_id").value = data.booking.package_id;
            document.getElementById("wedding_date").value = data.booking.wedding_date;
            document.getElementById("mobile").value = data.booking.mobile;  
            document.getElementById("message").value = data.booking.message;
        })
       .catch(function(err) {
            console.log(err);
        });


        fetch('http://localhost:3000/availabilities/').then(function(response) {
            return response.json();
        })
        .then(function(data) {

          
            const availabilitiesSelect = data.availabilities;
            console.log(availabilitiesSelect)
            let availGroupsSelect = " ";

            availabilitiesSelect.map(availability =>  {
                availGroupsSelect += `
                               <option value="${availability.name}">${availability.name} </option>
                             
                `
            })
                document.querySelector(".packageOptions").innerHTML += availGroupsSelect;
             })   




       function editContact() {
            //get quantity from form
            const formElement = document.getElementById('editContact');
            const formData = new FormData(formElement);
            console.log(formData)
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            //add ID of chosen booking to jsonObject
            jsonObject.id = "{{$id}}";
            //add user email to jsonObject
            //jsonObject.email = localStorage.getItem('email');
            console.log(JSON.stringify(jsonObject));

            //store all headers into a single variable
            let reqHeader = new Headers();
            reqHeader.append('Access-Control-Request-Headers', 'Content-Type, Access-Control-Request-Method, X-Requested-With, Authorization');
            reqHeader.append('Content-Type', 'application/json');
            reqHeader.append('Access-Control-Request-Method', 'PUT');
            reqHeader.append('X-Requested-With', 'XMLHttpRequest');
            reqHeader.append('Authorization', 'Bearer ' + localStorage.getItem('token'));

            //create optional init object for supplying options to the fetch request
            let initObject = {
                method: 'PUT', headers: reqHeader, body: JSON.stringify(jsonObject),
            };

            //create a resource request object through the Request() constructor
            let clientReq = new Request('http://localhost:3000/bookings/{{$id}}', initObject);

            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                document.querySelector('#status').classList = "alert-tagumpay"
                document.getElementById("status").innerHTML = data.data.message;
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });

       };





    </script>

        
            

            
        
@endsection