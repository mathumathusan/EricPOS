<base href="/public">

@extends('admin.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section("content")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <title>Document</title>
</head>
<body>
        <form action="{{ route('deleteDesigns') }}" method="post" id="designForm" class="container-designs">
                @csrf
                <h4 class="title-categorypages">Designs for Category: <span class="title-category"> {{ $category }}</span></h4>
                <div class="">
    
                    <label for="selectAll" class="gap-16 d-flex">
                        <input type="checkbox" id="selectAll" class="mr-2 checkbox-style design-checkbox"/>
                        <span>
                            Select All
                        </span>
        
                       
                    </label>
                    <div class="action-buttons ">
                        <button type="button" class="mb-3 btn btn-danger" onclick="confirmation(event)">Delete</button>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                                 Add {{$category}} Design
                         </button> 
                    </div>
                </div>
                
                {{-- category design start --}}
                <div class="card-design-collections row justify-content-md-evenly align-items-start justify-content-sm-start">
                    @foreach ($des as $design)
                        @if ($design->images->isNotEmpty())
                            <div class="mb-0 mr-0 card col-xl-2 col-lg-2 col-md-3 col-sm-5 custom-card-category">
                                <div class="pt-3 card-header categorycustom-cardheader">
                                    <!-- Keep the checkbox in the header if needed -->
                                    <input type="checkbox" name="selectedDesigns[]" value="{{ $design->id }}" class="design-checkbox">
                                </div>
                                <div class="card-body custom-cardbody">
                                    @foreach ($design->images as $image)
                                        <div class="image-container">
                                            {{-- <img src="{{ $image->image }}" class="images-category1"/> --}}

                                            <a href="http://127.0.0.1:8000/design/view1/AAA">
                                                <img src="{{  asset('storage/images/' . $image->image)}}"  class="images-category1" alt="AAA">
                                                <img src="{{  asset('storage/images/' . 'image1.jpg')}}"  class="images-category1" alt="AAA">
                                                <img src="{{ $image->image}}" class="images-category1"/> 
                                            </a>
                                            <div class="overlay">
                                                <a href="{{ route('design.delete', $image->id) }}" onclick="deletedata(event)">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </div>


                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- <p>No images available for this design.</p> --}}
                        @endif
                    @endforeach
                </div>
                
                {{-- category design end --}}
         
        </form>
   


  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Model title</h5>
       
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('design.store')}}" method="post" id="add_design_form" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="category">Category</label>
                                <input type="text" name="category" value="{{$category}}" readonly>
                    </div>     
                    <div class="mb-3">
                            <label for="images">Images</label>
                            <input type="file" name="images[]" multiple required/>
                        @error("images")
                            <div class="alert alert-danger text-danger">
                                {{$message}}
                        </div>
                        @enderror   
                    </div>               
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
      </div>
     
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    function deletedata(del) {
            del.preventDefault();
            var urlToRedirect = del.currentTarget.href;
            console.log(urlToRedirect);

            swal({
                title: "Are you sure you want to delete this?",
                text: "You won't be able to revert this delete.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel) => {
                if (willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }

        function confirmdelete()
        {
            return confirm("Are you sure you want to delete this");
        }
        document.addEventListener('DOMContentLoaded', function () {
            const selectAllCheckbox = document.getElementById('selectAll');
            const designCheckboxes = document.querySelectorAll('.design-checkbox');

            selectAllCheckbox.addEventListener('change', function () {
                designCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
        });

    function confirmationdelete(deleteimage) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.href;
    console.log(urlToRedirect);
    
    swal({
        title: "Are you sure you want to delete this?",
        text: "You won't be able to revert this delete.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willCancel) => {
        if (willCancel) {
            window.location.href = urlToRedirect;
        }
    });
}



function confirmation(ev) {
    ev.preventDefault();

    swal({
        title: "Are you sure you want to delete this?",
        text: "You won't be able to revert this delete.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willCancel) => {
        if (willCancel) {
            // You should use the form's action URL here
            document.getElementById('designForm').submit();
            // Move the redirection inside the submit success callback
            document.getElementById('designForm').addEventListener('submit', function() {
                window.location.href = urlToRedirect;
            });
        }
    });
}







    </script>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Fetch data from the API
        $.ajax({
            url: '/designs',
            method: 'GET',
            success: function (response) {
                const designs = response.designs;

                // Loop through designs
                for (const design of designs) {
                    if (design.images) {
                        // Loop through images for each design
                        for (const image of design.images) {
                            // Your logic to append images to the HTML
                            // Example:
                            const imgElement = $('<img>').attr('src', 'storage/designimages/' + image.image).addClass('img-fluid mb-3');
                            const checkboxElement = $('<input>').attr({
                                type: 'checkbox',
                                name: '',
                                value: design.id
                            }).addClass('design-checkbox');
                            const deleteLinkElement = $('<a>').attr('href', 'design/delete/' + image.id).text('delete');

                            // Append elements to a container or the document body
                            // Example:
                            $('#section-body ').append(imgElement, checkboxElement, deleteLinkElement);
                        }
                    }
                }
            },
            error: function (error) {
                console.error('Error fetching data from API:', error);
            }
        });
    </script>

@endsection