@extends('layouts.app')

@section('title')
My Transactions
@endsection

@section('content')

                              <form id="createReview">
                                <p id="success"> </p>
                            @csrf

                            <div class="form-group">
                                <label for="title">Name: </label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Review Title">
                            </div>

                            <div class="form-group">
                                <label for="content">Content: </label>
                                <textarea id="message" rows="5" class="form-control" name="content" placeholder="Your review"> </textarea> 
                            </div>

                            <button id="createReviewButton" onclick="updateReview" class="btn btn-primary btn-block" data-dismiss="modal"> Submit Review</button>
                        </form>
              
                </div>
            </div>
        </div> {{-- new dev modal --}}






    <script type="text/javascript">

    
          fetch('http://localhost:3000/reviews/{{$id}}', {
            method: 'get',
            headers: {
                 "Content-Type" : "application/json",
                "Authorization" : "Bearer " + localStorage.getItem('token')
            }
          })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            //dynamically fill in product info from API's response
            //console.log(data.availability.name);
            document.getElementById("name").value = data.availability.name;
            document.getElementById("description").value = data.availability.description;
            document.getElementById("seats").value = data.availability.seats;
            document.getElementById("price").value = data.availability.price;
        })
       .catch(function(err) {
            console.log(err);
        });

      
       function updateReview() {
            //get quantity from form
           let title = document.querySelector('#title').value 
           let message = document.querySelector('#message').value


            const formData = new FormData();
           formData.title = title
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
            let clientReq = new Request('http://localhost:3000/availabilities/{{$id}}', initObject);

            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                document.getElementById('status').classList = "alert-tagumpay"
                document.getElementById("status").innerHTML = data.data.message;
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });

       };

    </script>

        
            

            
        
@endsection