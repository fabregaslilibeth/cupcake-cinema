@extends('layouts.app')

@section('title')
My Transactions
@endsection

@section('content')


<div class="container-fluid">
    <h3 class="text-center">My Reviews  
     <div class="row my-4">
        <div class="col-lg-9 mx-auto">

               <div class="row my-4 py-4" id="review">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 mx-auto" >
                            <div class="form-wrapper col-lg-12">
                               <form id="createReview">
                            @csrf

                            <div class="form-group">
                                <label for="title">Name: </label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Review Title">
                            </div>

                            <div class="form-group">
                                <label for="message">Content: </label>
                                <textarea id="message" rows="5" class="form-control" name="message" placeholder="Your review"> </textarea> 
                            </div>

                        </form>
                            <button id="createReviewButton" onclick="createReview" class="btn btn-primary btn-block" data-dismiss="modal"> Submit Review</button>
                             </div>   
                        </div>                               
                    </div>                               
                </div>                               
            </div>                               


                      
    </div>
</div>
     


    <script type="text/javascript">

        
        document.querySelector('#createReviewButton').addEventListener('click', function() {
            const formElement = document.getElementById('createReview');
            console.log(formElement)
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
            let clientReq = new Request('http://localhost:3000/reviews/', initObject);

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

        })


   

    </script>

        
            

            
        
@endsection