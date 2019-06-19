@extends('layouts.app')

@section('title')
My Transactions
@endsection

@section('content')


<div class="container-fluid">
     <div class="row my-4">
        <div class="col-lg-9 mx-auto">

               <div  id="review">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 mx-auto" >
                            <div class="form-wrapper p-4 col-lg-12">
                                <h3 class="text-center">Add Review</h3>
                                 <p id="status"></p>   
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

                               <div class="form-group">
                                <label for="image">Image Link: </label>
                               <input type="text" id="image_path" class="form-control" name="image_path" placeholder="Image Path">
                            </div>


                        </form>
                            <button id="createReviewButton" onclick="createReview" class="btn btn-outline-secondary btn-block" data-dismiss="modal"> Submit Review</button>
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
            let clientReq = new Request('https://vast-headland-67419.herokuapp.com/reviews/', initObject);

             console.log(clientReq)   
            //use above request object as the argument for our fetch request
            fetch(clientReq).then(function(response) {
                return response.json();
            })
            .then(function(response) {
                console.log(response);
                document.querySelector('#status').classList = "alert-tagumpay";
                document.querySelector('#status').innerHTML = "Successfully added review.";
               // window.location.replace('/reviews/{id}')


            })
            .catch(function(err) {
                console.log("Something went wrong!", err);
                document.querySelector('#status').classList = "alert-bigo";
                document.querySelector('#status').innerHTML = "Something went wrong. Check again.";
            });

        })


   

    </script>

        
            

            
        
@endsection