@extends('layouts.app')

@section('title')
Admin Dashboard
@endsection

@section('content')
<div class="container-fluid mx-auto">
<p id="success"></p>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">Add Package</div>
                <div id="status"></div>

                <div class="card-body">
                    <form id="addItem" class="col-lg-6">         
                
                        <div class="form-group">
                            <label for="name">Package name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="description">description:</label>
                            <input class="form-control" type="text" name="description" id="description">
                        </div>

                        <div class="form-group">
                            <label for="price">Package Price </label>
                            <input class="form-control" type="number" name="price" id="price">
                        </div>

                    </form>

                    <button onclick="submit()" id="addToCat">Add Package</button>
                </div>
            </div>
        </div>
   
    </div>
</div>

    <script type="text/javascript">

        function submit() {
            //select the form element
               document.querySelector("#addToCat").addEventListener("click", function() {
                let name = document.querySelector("#name")
                let description = document.querySelector("#description") 
                let price = document.querySelector("#price")

                let formData = new FormData()

                formData.name = name.value
                formData.description = description.value
                formData.price = price.value

                console.log(formData)
                fetch("http://localhost:3000/availabilities/create", {
                    method: "POST",
                    headers : {
                        'Content-Type' : 'application/json'
                    },
                    body : JSON.stringify(formData)
                })
                .then(res=>res.json())
                .then(res => {
                     window.location ='/packages'
                    //add the class alert-success to #success
                    document.querySelector("#success").classList.add("alert-success")
                    //change the content of #success to print out "Successfully created the blog (name of blog)"
                    document.querySelector("#success").innerHTML = "Successfully created blog " + res.title
                })
                .catch(error => console.error('Error:', error))

            })
        };
    </script>

        
            

            
        
@endsection