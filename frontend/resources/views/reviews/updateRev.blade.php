@extends('layouts.app')

@section('title')
Cupcake Cinema || Edit a review
@endsection

@section('content')


<div class="container-fluid">
<p id="status"></p>
    <h3 class="text-center">Edit a review</h3> 
    <div class="row my-4" id="reviewList">
        <div class="col-lg-9 mx-auto">

<p id="status"></p>
            <div class="row my-4 py-4" id="review">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 mx-auto" >
                            <div class="form-wrapper col-lg-12">
                                <form id="editReview" class="py-4 my-4">
                                    @csrf

                                    <div class="form-group">
                                        <label for="title">Title: </label>
                                        <input type="text" id="title" class="form-control" name="title" value="Your Name">
                                    </div>                                

                                    <div class="form-group">
                                        <label for="message">message: </label>
                                        <textarea id="message" class="form-control" name="message"  cols="30" rows="10"></textarea>
                                    </div>
                                </form>    
                                  <button id="updateReviewButton" onclick="editReview()" class="btn btn-secondary btn-block" data-dismiss="modal"> Submit</button>                                   
                             </div>   
                        </div>                               
                    </div>                               
                </div>                               
            </div>                               

        </div>
    </div>
</div>

    <script type="text/javascript">
      fetch('http://localhost:3000/reviews/showEdit/{{$id}}', {
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
            document.getElementById("title").value = data.review.title;
            document.getElementById("message").value = data.review.message;
        })
       .catch(function(err) {
            console.log(err);
        });




       function editReview() {
            //get quantity from form
            const formElement = document.getElementById('editReview');
            const formData = new FormData(formElement);
            console.log(formData)
            let jsonObject = {};
            for (const [key, value] of formData.entries()) {
                jsonObject[key] = value;
            };
            //add ID of chosen review to jsonObject
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
            let clientReq = new Request('http://localhost:3000/reviews/{{$id}}', initObject);

            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                document.getElementById("status").innerHTML = data.data.message;
            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
            });

       };
    </script>

        
            

            
        
@endsection